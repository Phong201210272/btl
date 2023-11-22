<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\loaisp;
use App\Models\matutang;
use Illuminate\Http\Request;
use Illuminate\Queue\RedisQueue;
use Illuminate\Support\Facades\DB;
use App\Models\sanpham;
use App\Models\chitietsanpham;

class SanPhamController extends Controller
{
    public function index()
    {
        $products = DB::table('sanpham')
            ->join('loaisp', 'sanpham.maloai', '=', 'loaisp.maloai')
            ->join('chitietsanpham', 'sanpham.masp', '=', 'chitietsanpham.masp')
            ->select('sanpham.masp', 'tensp', 'tenloai', 'machitiet', 'mau', 'kichco', 'chatlieu', 'gia')
            ->get();
        return view('admin', compact('products'));
    }

    public function create()
    {
        $table = 'sanpham';
        $column = 'masp';
        $matt = 'SP12';
        $ma = new matutang();
        $ma = $ma->ma($table, $column, $matt);
        $table2 = 'chitietsanpham';
        $column2 = 'machitiet';
        $matt2 = 'CT00';
        $ma2 = new matutang();
        $ma2 = $ma2->mact($table2, $column2, $matt2);
        return view('create', compact('ma', 'ma2'));
    }

    public function add(Request $request)
    {
        $sp = new sanpham();
        $ctsp = new chitietsanpham();
//        if ($request->tenloai = 'Vỏ gối')
//            $request->maloai = 'L01';
//        elseif ($request->tenloai = 'Vỏ chăn')
//            $request->maloai = 'L02';
//        else
//            $request->maloai = 'L03';
        $tenloai = $request->input('tenloai');
        $maloai = DB::select('SELECT maloai FROM loaisp WHERE tenloai = ?', [$tenloai])[0]->maloai;
        $data = [
            'masp' => $request->masp,
            'tensp' => $request->tensp,
            'maloai' => $maloai
        ];
        $data1 = [
            'mau' => $request->mau,
            'kichco' => $request->kichco,
            'chatlieu' => $request->chatlieu,
            'gia' => $request->gia,
            'soluong' => $request->soluong,
            'machitiet' => $request->machitiet,
            'masp' => $request->masp,
            'anh' => $request->anh
        ];
        $sp->insertData($data);
        $ctsp->insertData($data1);
        return redirect()->route('admin');
    }

    public function edit(Request $request, $mact)
    {
        $chitietsanpham = new chitietsanpham();
//        $productdetailFind = $chitietsanpham->getProductByDetailId($mact);
        $productdetailFind = DB::table('sanpham')
            ->join('loaisp', 'sanpham.maloai', '=', 'loaisp.maloai')
            ->join('chitietsanpham', 'sanpham.masp', '=', 'chitietsanpham.masp')
            ->select('sanpham.masp', 'tensp', 'tenloai', 'machitiet', 'mau', 'kichco', 'chatlieu', 'gia', 'soluong', 'anh')
            ->where('machitiet', '=', $mact)
            ->first();
        $request->session()->put('machitiet', $productdetailFind->machitiet);
        $request->session()->put('masp', $productdetailFind->masp);
        // Use dd() to dump and die, checking the session values
//        dd(session('machitiet'));
//        dd($productdetailFind);
//        dd($products);

        return view('edit', compact('productdetailFind'));
    }

    public function update(Request $request)
    {
        $machitiet = $request->session()->get('machitiet');
        $masp = $request->session()->get('masp');
        // Use dd() to dump and die, checking the retrieved session value
        $sanpham = new sanpham();
        $chitietsanpham = new chitietsanpham();
        $tenloai = $request->input('tenloai');
        $maloai = DB::select('SELECT maloai FROM loaisp WHERE tenloai = ?', [$tenloai])[0]->maloai;
        $dataupdate1 = [
            'tensp' => $request->tensp,
            'maloai' => $maloai,
        ];
        $dataupdate2 = [
            'mau' => $request->mau,
            'kichco' => $request->kichco,
            'chatlieu' => $request->chatlieu,
            'gia' => $request->gia,
            'soluong' => $request -> soluong,
            'anh' => $request->anh
        ];
        $sanpham -> updateData($dataupdate1, $masp);
        $chitietsanpham -> updateData($dataupdate2, $machitiet);
        return redirect()->route('admin');
    }
    public function xoa(Request $request){
        $machitiet = $request->session()->get('machitiet');
        $masp = $request->session()->get('masp');
        $sanpham = new sanpham();
        $chitietsanpham = new chitietsanpham();
        $chitietsanpham -> deleteData($machitiet);
        $sanpham -> deleteData($masp);
        return redirect()-> route('admin');
    }
}

?>
