<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddToCartController extends Controller
{
    public function addtocart(Request $request)
    {
        $newProduct = [
            'tensp' => $request->tensp,
            'ma' => $request->masp,
            'soluong' => $request->quantity,
            'kichco' => $request->size,
            'mau' => $request->mau
        ];

        if (session()->has('chitiet')) {
            $gioHang = session('chitiet', []);

            // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng hay chưa
            $existingProductIndex = $this->findProductIndex($gioHang, $newProduct);

            if ($existingProductIndex !== false) {
                // Nếu đã tồn tại, cộng số lượng vào sản phẩm đã có
                $gioHang[$existingProductIndex]['soluong'] += $newProduct['soluong'];
            } else {
                // Nếu chưa tồn tại, thêm sản phẩm mới vào giỏ hàng
                $gioHang[] = $newProduct;
            }

            session(['chitiet' => $gioHang]);
        } else {
            // Nếu giỏ hàng chưa tồn tại, tạo mới giỏ hàng
            session(['chitiet' => [$newProduct]]);
        }

        return redirect(route('cart'));
    }

    /**
     * Tìm kiếm sản phẩm trong giỏ hàng và trả về chỉ số nếu tìm thấy, ngược lại trả về false.
     *
     * @param array $cart
     * @param array $product
     * @return int|bool
     */
    private function findProductIndex(array $cart, array $product)
    {
        foreach ($cart as $index => $item) {
            // Kiểm tra xem các thuộc tính của sản phẩm có giống nhau hay không
            if (
                $item['ma'] == $product['ma'] &&
                $item['kichco'] == $product['kichco'] &&
                $item['mau'] == $product['mau']
            ) {
                return $index;
            }
        }

        return false;
    }
}
