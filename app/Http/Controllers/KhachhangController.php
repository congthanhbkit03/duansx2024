<?php

namespace App\Http\Controllers;

use App\Models\Khachhang;
use Illuminate\Http\Request;
use DataTables;

class KhachhangController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $khachhangs = Khachhang::latest()->get();
            return DataTables::of($khachhangs)
                ->addIndexColumn()
                ->addColumn('action', function ($khachhang) {
                    $btn = '
                        <button 
                        class="btn btn-info" onclick="xemTT(' . $khachhang->id . ')"><i class="fas fa-eye"></i></button>
                        
                        <a href="' . route('khachhangs.edit', $khachhang->id) . '" 
                        class="btn btn-warning"><i class="fas fa-pen"></i></a>
                        
                        <a href="' . route('khachhangs.delete', $khachhang->id) . '" 
                        class="btn btn-danger"><i class="fas fa-trash"></i></a>
                    ';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('khachhangs.index');
    }

    public function view($id)
    {
        $kh = Khachhang::find($id);
        return response()->json($kh);
    }
    public function add()
    {

        return view('khachhangs.form');
    }

    public function save(Request $request)
    {
        $validated = $request->validate([
            // 'title' => 'required|unique:posts|max:255',
            'tenkh' => 'required',
        ]);

        $data = [
            // 'makh' => $request->makh,
            'tenkh' => $request->tenkh,
            'lienhe' => $request->lienhe,
            'sdt' => $request->sdt,
            'diachi' => $request->diachi,
            'masothue' => $request->masothue,
            'giaohang1' => $request->giaohang1,
            'sdt1' => $request->sdt1,
            'km1' => $request->km1,
            'giaohang2' => $request->giaohang2,
            'sdt2' => $request->sdt2,
            'km2' => $request->km2,
            'ghichu' => $request->ghichu,
            'nguoitao' => '',
            'mang' => '???'
        ];

        $newkh = Khachhang::create($data);
        $newkh->makh = "KH" . sprintf("%05d", $newkh->id);
        $newkh->save();

        return redirect()->route('khachhangs');
    }

    public function edit($id)
    {
        $khachhang = Khachhang::find($id);

        return view('khachhangs.form', ['khachhang' => $khachhang]);
    }

    public function update($id, Request $request)
    {
        $data = [
            'tenkh' => $request->tenkh,
            'lienhe' => $request->lienhe,
            'sdt' => $request->sdt,
            'diachi' => $request->diachi,
            'masothue' => $request->masothue,
            'giaohang1' => $request->giaohang1,
            'sdt1' => $request->sdt1,
            'km1' => $request->km1,
            'giaohang2' => $request->giaohang2,
            'sdt2' => $request->sdt2,
            'km2' => $request->km2,
            'ghichu' => $request->ghichu,
            'nguoitao' => '',
            'mang' => '???'
        ];

        Khachhang::find($id)->update($data);

        return redirect()->route('khachhangs');
    }

    public function delete($id)
    {
        Khachhang::find($id)->delete();

        return redirect()->route('khachhangs');
    }

    public function search($search)
    {

        $khachhang = Khachhang::where('tenkh', 'LIKE', "%$search%")->get();

        return response()->json($khachhang);

    }
}
