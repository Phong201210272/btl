<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->json()->all();
        $a = session()->get('chitiet', []);
        if (session()->has('chitiet')) {
            $gioHang = session('chitiet', []);

            foreach ($gioHang as $index => $product) {
                if ($product['ma'] === $data['ma']) {
                    // Lấy ra sản phẩm hiện tại trong session để debug
                    $sanPhamHienTai = $gioHang[$index];

                    // Cập nhật số lượng sản phẩm
                    $gioHang[$index]['soluong'] = $data['soluong'];
                    break;
                }
            }

            session(['chitiet' => $gioHang]);
        }

        var_dump($sanPhamHienTai);

        return response()->json(['message' => 'Số lượng sản phẩm đã được cập nhật trong session']);
    }
}
