<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChitietdonhangModel;
class DonhangModel extends Model
{
    use HasFactory;
    protected $table = "don_hang";
    protected $fillable = ['ten_KH','ngay_mua','so_dt','dia_chi'];
    public function chi_tiet_don_hang(){
        return $this->hasMany(ChitietdonhangModel::class,'don_hang_id');
    }
}
