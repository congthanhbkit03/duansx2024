<?php

namespace App\Http\Controllers;

use App\Models\Donhang;
use App\Models\Sanpham;
use Illuminate\Http\Request;
use DataTables;


class SanphamController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $sanphams = Sanpham::latest()->get();
            return DataTables::of($sanphams)
                ->addIndexColumn()
                ->addColumn('action', function ($sanpham) {
                    $btn = '
                        <a href="' . route('sanphams.show', $sanpham->id) . '" 
                        class="btn btn-info"><i class="fas fa-eye"></i></a>
                        
                        <a href="' . route('sanphams.edit', $sanpham->id) . '" 
                        class="btn btn-warning"><i class="fas fa-pen"></i></a>
                        
                        <a href="' . route('sanphams.delete', $sanpham->id) . '" 
                        class="btn btn-danger"><i class="fas fa-trash"></i></a>
                    ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('sanphams.index');
    }

    public function add()
    {

        return view('sanphams.form');
    }

    public function save(Request $request)
    {
        $data = [
            // 'madonhang' => $request->madonhang,
            // 'ngaygiaohang' => $request->ngaygiaohang,
            // 'loaidonhang' => $request->loaidonhang,
            // 'soluong' => $request->soluong,
            // 'congdoan' => '',
            // 'trangthai' => 'Chưa sản xuất'
            'tensp' => $request->tensp,
            'masp' => $request->masp,
            'kieusp' => $request->kieusp,
            'dai' => $request->dai,
            'rong' => $request->rong,
            'cao' => $request->cao,
            'song' => $request->song,
            'kieuin' => $request->kieuin,
            'somau' => $request->somau,
            'ghichu' => $request->ghichu,
            'daiphoi' => $request->daiphoi,
            'rongphoi' => $request->rongphoi,
            'nap1' => $request->nap1,
            'caonap1' => $request->caonap1,
            'nap2' => $request->nap2,
            'caonap2' => $request->caonap2,
            'nap3' => $request->nap3,
            'nap4' => $request->nap4,
            'lang' => $request->lang,
            'bat' => $request->bat,
            'lebien' => $request->lebien,
            'khogiay' => $request->khogiay,
            'trongluong' => $request->trongluong,
            'dientich' => $request->dientich,
            'dobuc' => $request->dobuc,
            'nenect' => $request->nenect,
            'nenfct' => $request->nenfct,
            'mat3' => $request->mat3,
            'song3' => $request->song3,
            'mat2' => $request->mat2,
            'song2' => $request->song2,
            'mat1' => $request->mat1,
            'song1' => $request->song1,
            'matin' => $request->matin,
            'chongtham' => $request->chongtham,
            'canmang' => $request->canmang,
            'boi' => $request->boi,
            'chap' => $request->chap,
            'be' => $request->be,
            'dan' => $request->dan,
            'ghim' => $request->ghim,
            'bocot' => $request->bocot,
            'quanmang' => $request->quanmang,
            'trangthai' => '0',
            'congdoan' => '',
            'donhang_id' => $request->donhang_id
        ];

        Sanpham::create($data);

        return redirect()->route('sanphams');
    }

    public function show($id)
    {
        $donhang = Donhang::find($id);
        return view('donhangs.show', ['donhang' => $donhang]);
    }

    public function edit($id)
    {
        $donhang = Donhang::find($id);
        return view('donhangs.form', ['donhang' => $donhang]);
    }

    public function update($id, Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'level' => $request->level
        ];

        Donhang::find($id)->update($data);

        return redirect()->route('donhangs');
    }

    public function delete($id)
    {
        Donhang::find($id)->delete();

        return redirect()->route('donhangs');
    }

    public function getCongdoan($id)
    {
        //lay cac cong doan cua san pham - no dang la string
        $cds = Sanpham::find($id, ['congdoan']);
        //chuyen thanh string
        // $myArray = explode(',', $cds);
        return response()->json($cds); //tra ve dang { congdoan: "1,2, 4, 5, 6"}
        // return $myArray;
    }
}
