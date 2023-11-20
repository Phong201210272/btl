<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Testing\Fluent\Concerns\Has;

class nguoidung extends Model{
    use HasFactory;
    protected $table = 'nguoidung';
    public function insertNguoidung($data){
        return DB::table($this->table)->insert($data);
    }
}
?>
