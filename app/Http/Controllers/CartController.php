<?php
namespace App\Http\Controllers;

use App\Models\chitietsanpham;
use App\Models\sanpham;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function getCart()
    {
        $a = session()->get('chitiet');
//        dd($a[0]['ma']);
        $chitiet = [];
        $chitietsanpham = new chitietsanpham();
        if (!empty($a)) {
            for ($i = 0; $i < count($a); $i++) {
                $b = $chitietsanpham->getmachitiet($a[$i]['ma'], $a[$i]['mau'], $a[$i]['kichco']);
                $c = $a[$i]['soluong'];
                $d = $c * $b->gia;
                $chitiet[$i] = [
                    'machitiet' => $b->machitiet,
                    'tensp' => $b->tensp,
                    'mau' => $b->mau,
                    'kichco' => $b->kichco,
                    'gia' => $b->gia,
                    'quantity' => $c,
                    'tongtien' => $d

                ];
            }
        }
//        dd($chitiet);
        return view('cart', compact('chitiet'));
    }

}

?>
