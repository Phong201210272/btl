<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\SanPhamController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\API\AddToCartController;
use App\Http\Controllers\CheckoutController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class,'index'])->name('index');
Route::get('/home',[HomeController::class,'index'])->name('index');
Route::get('/login',[LoginController::class,'getFormLogin']);
Route::get('/loginadmin',[LoginAdminController::class,'getFormLoginAdmin']);
Route::post('/loginadmin',[LoginAdminController::class,'loginadmin'])-> name('loginadmin');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/details/{masp}',[HomeController::class,'productDetails']);
Route::post('/register',[RegisterController::class,'checkRegister'])->name('register');
Route::get('/register', function () {
    return view("register");
});
Route::get('/logout', function () {
    Session::forget('nguoidung');
    return redirect("/login");
});
Route::get('/admin', [SanPhamController::class, 'index'])->name('admin');
Route::get('/create',[SanPhamController::class, 'create']);
Route::post('/create', [SanPhamController::class, 'add'])->name('addsanpham');
Route::get('/edit/{machitiet}', [SanPhamController::class, 'edit']);
Route::post('/edit', [SanPhamController::class, 'update'])->name('editsanpham');
Route::get('/xoa', [SanPhamController::class, 'xoa'])->name('xoa');
Route::get('/cart', [CartController::class, 'getCart'])->name('cart')->middleware('authentication');
Route::post('/add-to-cart', [AddToCartController::class, 'addtocart'])->name('add-to-cart');
Route::post('/update-quantity', [CartController::class, 'updatequantity'])->name('update-quantity');
Route::get('/order', [CheckoutController::class, 'index'])->name('hoadon');
Route::delete('/cart/delete/{index}', [CartController::class, 'deleteProduct'])->name('cart.delete');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('checkout.process');
//Route::post('/checkout', [CheckoutController::class, 'checkout']);
//Route::get('/hoadon', [HoaDonController::class, 'index'])->name('hoadon');
Route::get('/create-cart', [App\Http\Controllers\Api\CartController::class, 'create']);
