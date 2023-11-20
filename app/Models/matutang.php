<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class matutang extends Model
{
    use HasFactory;
    public function ma($table, $ma, $matt) {
        $data = DB::table($table)->orderBy($ma, 'desc')->first();

        if (!empty($data)) {
            $maht = $data->$ma;
            $number = intval(substr($maht, 2)) + 1; // Bỏ qua phần "SP" và chuyển thành số
            $maht = 'SP' . str_pad($number, 2, '0', STR_PAD_LEFT);
        } else {
            $maht = $matt;
        }

        return $maht;
    }
    public function mand($table, $ma, $matt) {
        $data = DB::table($table)->orderBy($ma, 'desc')->first();

        if (!empty($data)) {
            $maht = $data->$ma;
            $number = intval(substr($maht, 2)) + 1; // Bỏ qua phần "SP" và chuyển thành số
            $maht = 'ND' . str_pad($number, 2, '0', STR_PAD_LEFT);
        } else {
            $maht = $matt;
        }

        return $maht;
    }
    public function mact($table, $ma, $matt) {
        $data = DB::table($table)->orderBy($ma, 'desc')->first();

        if (!empty($data)) {
            $maht = $data->$ma;
            $number = intval(substr($maht, 2)) + 1; // Bỏ qua phần "SP" và chuyển thành số
            $maht = 'CT' . str_pad($number, 2, '0', STR_PAD_LEFT);
        } else {
            $maht = $matt;
        }

        return $maht;
    }
}
