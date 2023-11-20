<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;



class sanpham extends Model
{
    use HasFactory;
    protected $table = 'sanpham';
    public function getAllsp(){
//        return DB::select('select * from sanpham');
        return DB::table($this->table)->get();
    }

    public function getProductById($masp)
    {
        // Sử dụng Eloquent để lấy sản phẩm từ cơ sở dữ liệu dựa trên ID
        $productFind = sanpham::where('masp', $masp)->first();

        return $productFind;
    }
    public function getProductByDetailId($mact)
    {
        // Sử dụng Eloquent để lấy sản phẩm từ cơ sở dữ liệu dựa trên ID
        $productdetailFind = sanpham::where('machitiet', $mact)->first();

        return $productdetailFind;
    }
    public function insertData($data){
        return DB::table($this->table)->insert($data);
    }
    public function updateData($data, $id){
        return DB::table($this->table) -> where('masp', $id)->update($data);
    }
    public function deleteData($id){
        return DB::table($this->table) -> where('masp', $id)->delete();

    }
}
