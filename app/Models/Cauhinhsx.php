<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cauhinhsx extends Model
{
    use HasFactory;

    protected $fillable = [
        'sanpham_id',
        'congdoan_id'
    ];
}
