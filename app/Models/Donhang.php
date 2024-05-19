<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donhang extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'madonhang',
        // 'soluong',
        // 'loaidonhang',
        'ngaygiaohang',
        'khachhang_id',
        'trangthai'
    ];

    public function khachhang()
    {
        return $this->belongsTo(Khachhang::class, 'khachhang_id');
    }
}
