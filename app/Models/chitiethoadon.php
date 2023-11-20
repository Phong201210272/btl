<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class chitiethoadon extends Model
{
    use HasFactory;

    protected $fillable = ['mahd', 'machitiet', 'soluong', 'thanhtien'];

    public function checkProductExistInOrder(Request $request, $mahd)
    {
        $chitiethoadon = chitiethoadon::where(['mahd' => $mahd, 'machitiet' => $request->machitiet])->first();
        if ($chitiethoadon) {
            return $chitiethoadon;
        }
        return null;
    }

    public function getSizeOfCart($user_id)
    {
        $order_id = Order::where(['user_id' => $user_id, 'order_status' => 0])->first()->id;
        return count(OrderDetail::where(['order_id' => $order_id])->get());
    }

    public function getAllProductsInCart($user_id)
    {
        $order_id = Order::where(['user_id' => $user_id, 'order_status' => 0])->first()->id;
        return DB::table('orders')
            ->join('order_details', 'order_details.order_id', '=', 'orders.id')
            ->join('products', 'products.id', '=', 'order_details.product_id')
            ->where('order_id', '=', $order_id)
//            ->selectRaw('products.*','orders.id as order_id','quantity','(quantity*products.price) as amount')
            ->selectRaw('products.*, orders.id as order_id, quantity, (quantity * products.price) as amount')
            ->get();

    }
}

?>
