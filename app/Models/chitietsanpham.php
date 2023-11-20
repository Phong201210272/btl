<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class chitietsanpham extends Model{
    use HasFactory;
    protected $table = 'chitietsanpham';
    public function insertData($data){
        return DB::table($this->table)->insert($data);
    }
    public function updateData($data, $id){
        return DB::table($this->table) -> where('machitiet', $id)->update($data);
    }
    public function deleteData($id){
        return DB::table($this->table) -> where('machitiet', $id)->delete();

    }
    public function getmachitiet($masp, $mau, $kichco){
        return DB::table($this->table)->join('sanpham', 'sanpham.masp', '=', 'chitietsanpham.masp')
            ->where('sanpham.masp', $masp )
            ->where('mau', $mau)
            ->where('kichco', $kichco)
            ->first();

    }
}
?>
