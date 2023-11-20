<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\sanpham;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $products = DB::table('sanpham')
            ->join('chitietsanpham', 'sanpham.masp', '=', 'chitietsanpham.masp')
            ->join('loaisp', 'sanpham.maloai', '=', 'loaisp.maloai')
            ->select('sanpham.masp', 'tensp', 'gia', 'anh',)
            ->get();

        return view('index', compact('products'));

    }

    public function productDetails($masp)
    {
        $sanpham = new sanpham();
        $productFind = $sanpham->getProductById($masp);
        $productFind = DB::table('sanpham')
            ->join('chitietsanpham', 'sanpham.masp', '=', 'chitietsanpham.masp')
            ->join('loaisp', 'sanpham.maloai', '=', 'loaisp.maloai')
            ->select('sanpham.masp', 'tensp', 'gia', 'anh',"kichco", "machitiet", 'mau')
            ->where('sanpham.masp', '=', $masp) // Thêm điều kiện ở đây
            ->get();
        return view('productDetails', ['productFind' => $productFind]);
//        dd($productFind);
    }

}

?>
