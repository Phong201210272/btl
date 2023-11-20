<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller{
    public function index(){
        $mand = session()->get('nguoidung')->mand;
//        dd($mand);
        $nguoidung = DB::table('nguoidung')
            ->select('tennd', 'sdt', 'email')
            ->where('mand', '=',$mand)
            ->first();
//        dd($nguoidung);
        return view('checkout', compact('nguoidung'));
    }
}
?>
