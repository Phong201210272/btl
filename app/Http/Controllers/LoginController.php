<?php
    namespace App\Http\Controllers;


use App\Models\taikhoan;
use Illuminate\Http\Request;
use Exception;

class LoginController extends Controller{
        public function getFormLogin(){
            return view('login');
        }


        public function login(Request $request){
            try{
                $taikhoan = new taikhoan();
                $nguoidung = $taikhoan->checkLogin($request);
                if($nguoidung){
                    $request->session()->put('nguoidung', $nguoidung);
                    return redirect()->route('index');
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
