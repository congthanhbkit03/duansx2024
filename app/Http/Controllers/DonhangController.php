<?php

namespace App\Http\Controllers;

use App\Models\Congdoan;
use App\Models\Donhang;
use App\Models\Sanpham;
use Illuminate\Http\Request;
use DataTables;


class DonhangController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $donhangs = Donhang::latest()->get();
            return DataTables::of($donhangs)
                ->addIndexColumn()
                ->addColumn('action', function ($Donhang) {
                    $btn = '
                        <a href="' . route('donhangs.show', $Donhang->id) . '" 
                        class="btn btn-info"><i class="fas fa-eye"></i></a>
                        
                        <a href="' . route('donhangs.edit', $Donhang->id) . '" 
                        class="btn btn-warning"><i class="fas fa-pen"></i></a>
                        
                        <a href="' . route('donhangs.delete', $Donhang->id) . '" 
                        class="btn btn-danger"><i class="fas fa-trash"></i></a>
                    ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('donhangs.index');
    }

    public function add()
    {

        return view('donhangs.form');
    }

    public function save(Request $request)
    {
        $data = [
            'madonhang' => $request->madonhang,
            'ngaygiaohang' => $request->ngaygiaohang,
            'loaidonhang' => $request->loaidonhang,
            'soluong' => $request->soluong,
            'trangthai' => 'Chưa sản xuất'
        ];

        Donhang::create($data);

        return redirect()->route('donhangs');
    }

    public function show($id)
    {
        $donhang = Donhang::find($id);
        $sanphams = Sanpham::where('donhang_id', $id)->get();
        $congdoans = Congdoan::all();
        return view('donhangs.show', ['donhang' => $donhang, 'sanphams' => $sanphams, 'congdoans' => $congdoans]);
    }

    public function themsp(Request $request, $id)
    {
        $data = [
            'masanpham' => $request->masanpham,
            'mota' => $request->mota,
            'donhang_id' => $id,
            'soluong' => $request->soluong,
            'trangthai' => 'Chưa sản xuất'
        ];

        Sanpham::create($data);

        return redirect()->route('donhangs.show', $id);
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
}
