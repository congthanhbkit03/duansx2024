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
                        <a href="' . route('khachhangs.edit', $khachhang->id) . '" 
                        class="btn btn-info"><i class="fas fa-eye"></i></a>
                        
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

    public function add()
    {

        return view('khachhangs.form');
    }

    public function save(Request $request)
    {
        $data = [
            'makh' => $request->makh,
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

        Khachhang::create($data);

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
            'item_code' => $request->item_code,
            'productname' => $request->productname,
            'category' => $request->id_category,
            'price' => $request->price
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
