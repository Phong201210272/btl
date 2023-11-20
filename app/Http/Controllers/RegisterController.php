<?php
namespace App\Http\Controllers;

use App\Models\matutang;
use Illuminate\Http\Request;
use App\Models\nguoidung;
use App\Models\taikhoan;

class RegisterController extends Controller
{
    public function checkRegister(Request $request)
    {
        $table = 'nguoidung';
        $column ='mand';
        $matt = 'ND00';
        $ma = new matutang();
        $ma = $ma -> mand($table, $column, $matt);
        $taikhoan = new taikhoan();
        $nguoidung = new nguoidung();
        $numberphoneRegex = '/^\d{10}$/';
        $cgmailRegex = '/^[a-zA-Z0-9._%+-]+@gmail\.com$/';
        $cpasRegex = '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/';
        $cnameRegex = '/^([a-zA-Z]+\s?)*[a-zA-Z]+$/';
        $username = $request->Username;
        $pass = $request->Password;
        $repass = $request->CFPassword;
        $email = $request->Email;
        $name = $request->TenND;
        $date = $request->DOB;
        $numberphone = $request->SDT;
        $gender = $request->Gender;
        if (!preg_match($cgmailRegex, $email)) {
            return redirect()->route('register')->withErrors(['Invalid email']);
        }
        if (nguoidung::where('Email', '=', $email)->exists()) {
            return redirect()->route('register')->withErrors(['Email already exists']);
        }
        if (!preg_match($cnameRegex, $name)) {
            return redirect()->route('register')->withErrors(['Invalid name']);
        }

        if (!preg_match($cpasRegex, $pass)) {
            return redirect()->route('register')->withErrors(['Invalid password']);
        }

        if ($pass != $repass) {
            return redirect()->route('register')->withErrors(['Passwords do not match']);
        }

        if (!preg_match($numberphoneRegex, $numberphone)) {
            return redirect()->route('register')->withErrors(['invalid phone number']);
        }

        if (nguoidung::where('sdt', '=', $numberphone)->exists()) {
            return redirect()->route('register')->withErrors(['Phone number already exists']);
        }
        if ($request->has('gender')) {
            $selected_gender = $request->input('gender');
        }
//        $prefix = substr(nguoidung::max('mand'), 0, 2); // Lấy phần tiền tố từ mã người dùng cuối cùng
//        $suffix = substr(nguoidung::max('mand'), 1); // Lấy phần hậu tố từ mã người dùng cuối cùng
//        $suffixNumber = intval($suffix); // Chuyển đổi phần hậu tố sang số nguyên
//
//        // Tăng giá trị của mã người dùng
//        $suffixNumber++;
//
//        // Nếu đạt đến giá trị tối đa, bạn có thể thêm logic xử lý tại đây
//
//        // Chuyển đổi số nguyên thành chuỗi với độ dài cố định, ví dụ: 3 chữ số
//        $suffixPadded = str_pad($suffixNumber, 3, '0', STR_PAD_LEFT);
//
//        // Kết hợp phần tiền tố và hậu tố để tạo mã người dùng mới
//        $newMaND = $prefix . $suffixPadded;
        $taikhoan->insertNguoidung([
            'username' => $request->Username,
            'password' => $request->Password,
            'loaitaikhoan' => 0
        ]);
        $nguoidung->insertNguoidung([
            'mand' => $ma,
            'tennd' => $request->TenND,
            'ngaysinh' => $request->DOB,
            'gioitinh' => 'Male',
            'sdt' => $request->SDT,
            'username' => $request->Username,
            'email' => $request->Email,
        ]);
        return redirect()->route('login');
    }
}

?>
