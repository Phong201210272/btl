<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class taikhoan extends Model
{
    use HasFactory;

    protected $table = 'taikhoan';

    public function checkLogin(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $user = taikhoan::where(['username' => $username, 'password' => $password])->first();
        if ($user) {
            return DB::table('taikhoan')
                ->join('nguoidung', 'taikhoan.username', '=', 'nguoidung.username')
                ->select('taikhoan.*', 'nguoidung.*')
                ->first();
        }
        return null;
    }
    public function insertNguoidung($data){
        return DB::table($this->table)->insert($data);
    }
}

?>
