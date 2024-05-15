<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khachhang extends Model
{
    use HasFactory;

    protected $fillable = [
        'makh',
        'tenkh',
        'lienhe',
        'sdt',
        'diachi',
        'masothue',
        'giaohang1',
        'sdt1',
        'km1',
        'giaohang2',
        'sdt2',
        'km2',
        'mang',
        'ghichu',
        'nguoitao'
    ];
}

