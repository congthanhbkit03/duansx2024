<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonhangChitiet extends Model
{
    use HasFactory;

    protected $fillable = [
        'donhang_id',
        'sanpham_id',
        'gia',
        'soluong',
        'trangthai'
    ];
}
