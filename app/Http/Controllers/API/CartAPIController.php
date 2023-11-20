<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\hoadon;
use App\Models\chitiethoadon;
use Illuminate\Http\Request;

class CartAPIController extends Controller
{
    public function addToCart(Request $request){
        try {
            $hoadon = new hoadon();
            $nguoidung = $request->session()->get('nguoidung');
            $mand = $nguoidung->mand;
            $checkhoadon = $hoadon->checkUserAlreadyHasCart($mand);
            //no cart
            if ($checkhoadon===-1){
                return $this->userHasNotCart($request,$mand);
            }
            //has cart
            else{
                return $this->userHasCart($request,$checkhoadon);
            }
        }catch (\Exception $e){
            return $e->getMessage();
        }
    }
    public function userHasCart(Request $request,$mahd){
        $chitiethoadon = new chitiethoadon();
        $checkExistschitiethoadon = $chitiethoadon->checkProductExistInhoadon($request,$mahd);
        if($checkExistschitiethoadon==null){
            $dataOfchitiethoadons = [
                'mahd'=>$mahd,
                'machitiet'=>$request->machitiet,
                'soluong'=>$request->soluong,
                'mand'=>$request->mand
            ];
            return chitiethoadon::create($dataOfchitiethoadons);
        }else{
            $checkExistschitiethoadon->update([
                'soluong'=>(int)$checkExistschitiethoadon->soluong+(int)$request->soluong
            ]);
            return $checkExistschitiethoadon;
        }

    }
    public function userHasNotCart(Request $request,$user_id) {
        $dataOfhoadon = [
            'hoadon_status' => 0,
            'payment_status' => 0,
            'user_id' => $user_id,
        ];
        $hoadonJustSave =  hoadon::create($dataOfhoadon);
        $dataOfchitiethoadons = [
            'hoadon_id'=>$hoadonJustSave->id,
            'product_id'=>$request->product_id,
            'quantity'=>$request->quantity,
        ];
        return chitiethoadon::create($dataOfchitiethoadons);
    }
    public function getSizeOfCart(Request $request) {
        $chitiethoadons = new chitiethoadon();
        $user = $request->session()->get('user');
        $user_id = $user->user_id;
        return ["sizeOfCart" => $chitiethoadons->getSizeOfCart($user_id)];
    }

    public function getAllProductsInCart(Request $request)
    {
        $chitiethoadons = new chitiethoadon();
        $user_id = $request->session()->get('user')->user_id;
        return $chitiethoadons->getAllProductsInCart($user_id);
    }
}

?>
