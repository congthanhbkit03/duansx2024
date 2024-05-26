<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'masanpham',
        // 'mota',
        // 'soluong',
        // 'congdoan',
        // 'donhang_id',
        // 'trangthai'
        'tensp',
        'masp',
        'kieusp',
        'dai',
        'rong',
        'cao',
        'song',
        'kieuin',
        'somau',
        'ghichu',
        'daiphoi',
        'rongphoi',
        'nap1',
        'caonap1',
        'nap2',
        'caonap2',
        'nap3',
        'nap4',
        'lang',
        'bat',
        'lebien',
        'khogiay',
        'trongluong',
        'dientich',
        'dobuc',
        'nenect',
        'nenfct',
        'mat3',
        'song3',
        'mat2',
        'song2',
        'mat1',
        'song1',
        'matin',
        'chongtham',
        'canmang',
        'boi',
        'chap',
        'be',
        'dan',
        'ghim',
        'bocot',
        'quanmang',
        'trangthai',
        'congdoan',
        'donhang_id',
        'mota',
        'ketcau',
        'gia',
        'soluong'
    ];
}
