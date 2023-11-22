<?php

namespace App\Http\Controllers;

use App\Models\chitietsanpham;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function getCart()
    {
        $a = session()->get('chitiet', []);
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
                    'tongtien' => $d,
                    'conlai' => $b->soluong
                ];
            }
        }

        return view('cart', compact('chitiet'));
    }

    public function deleteProduct($index)
    {
        $gioHang = session('chitiet', []);

        if (isset($gioHang[$index])) {
            unset($gioHang[$index]);
            session(['chitiet' => array_values($gioHang)]);

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
}
