<?php
namespace App\Http\Controllers;
use App\Models\taikhoan;
use Illuminate\Http\Request;

class LoginAdminController extends Controller{
    public function getFormLoginAdmin(){
        return view('loginadmin');
    }
    public function loginadmin(Request $request){
        try{
            $taikhoan = new taikhoan();
            $nguoidung = $taikhoan->checkLogin($request);
            if($nguoidung){
                $request->session()->put('nguoidung', $nguoidung);
                return redirect()->route('admin');
            }else{
                return 'Your username or password is wrong. Please check again';
            }
        }
        catch (Exception $e)
        {
            return $e->getMessage();
        }
    }
}
?>
