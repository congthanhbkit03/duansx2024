<?php

namespace App\Http\Controllers;

use App\Models\DonhangChitiet;
use Illuminate\Http\Request;

class DonhangchitietController extends Controller
{
    public function save(Request $request)
    {
        $data = [
            'donhang_id' => $request->donhang_id,
            'sanpham_id' => $request->sanpham_id,
            'soluong' => $request->soluong,
            'gia' => $request->gia,
            'trangthai' => 'Chưa sản xuất'
        ];
        // dd($data);
        // exit;
        DonhangChitiet::create($data);

        return redirect()->route('donhangs.show', $request->donhang_id);
    }
}
