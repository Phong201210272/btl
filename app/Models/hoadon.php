<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class hoadon extends Model
{
    use HasFactory;
    protected $table = 'hoadon';
    protected $fillable = ['mahd','ngaytao','mand'];
    public function checkUserAlreadyHasCart($mand){
//        dd($user_id);
        $hoadon = DB::table('hoadon')->where('mand','=', $mand)
            ->where('trangthai','=',0)
            ->first();
        if($hoadon){
            return $hoadon->id;
        }
        return -1;
    }
}

?>
