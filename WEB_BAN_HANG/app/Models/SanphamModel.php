<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TheloaiModel;
class SanphamModel extends Model
{
    use HasFactory;
    protected $table="san_pham";
    protected $fillable = ['ten_sp','gia_sp','hinh_anh','TL_id'];
    public function the_loai() {
        return $this->belongsTo(TheloaiModel::class,'TL_id','id');
    }
}