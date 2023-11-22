<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $nguoidung = session()->get('nguoidung'); // Lấy thông tin người dùng từ session hoặc database
        $chitiet = session()->get('chitiet', []);

        $sum = 0;
        foreach ($chitiet as $item) {
            $sum += $item['tongtien'];
        }

        return view('checkout', compact('nguoidung', 'chitiet', 'sum'));
    }

    public function checkout(Request $request)
    {
        // Xử lý thanh toán và lưu thông tin vào cơ sở dữ liệu (nếu cần)
        // ...

        // Xóa giỏ hàng sau khi thanh toán
        session()->forget('chitiet');
// Thêm session flash message
        $request->session()->flash('success', 'Order Success! Thank you for using our services');

        // Chuyển hướng hoặc không tùy vào yêu cầu của bạn
        return redirect()->route('checkout');
    }
}
