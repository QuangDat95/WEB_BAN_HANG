<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheloaiModel extends Model
{
    use HasFactory;
    protected $table = "the_loai";
    protected $fillable = ['the_loai'];
}
