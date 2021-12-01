<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DonhangModel;
use App\Models\SanphamModel;
class DanhsachdonhangModel extends Model
{
    use HasFactory;
    protected $table="chi_tiet_don_hang";
    protected $fillable = ['don_hang_id','san_pham_id','so_luong'];
    public function don_hang(){
        return $this->belongsTo(DonhangModel::class,'don_hang_id','id');
    }
    public function san_pham(){
        return $this->belongsTo(SanphamModel::class,'san_pham_id','id');
    }
}
