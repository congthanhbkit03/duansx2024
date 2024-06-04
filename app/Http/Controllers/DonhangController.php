<?php

namespace App\Http\Controllers;

use App\Models\Congdoan;
use App\Models\Donhang;
use App\Models\DonhangChitiet;
use App\Models\Khachhang;
use App\Models\Sanpham;
use Illuminate\Http\Request;
use DataTables;
use DB;

class DonhangController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $donhangs = Donhang::latest()->get();
            return DataTables::of($donhangs)
                ->addIndexColumn()
                ->addColumn('tenkh', function ($dh) {
                    return $dh->khachhang->tenkh;
                })
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
            // 'madonhang' => $request->madonhang,
            'ngaygiaohang' => $request->ngaygiaohang,
            // 'loaidonhang' => $request->loaidonhang,
            // 'soluong' => $request->soluong,
            'khachhang_id' => $request->khachhang_id,
            'trangthai' => 'Chưa sản xuất'
        ];

        $newdh = Donhang::create($data);
        $newdh->madonhang = "PO" . sprintf("%06d", $newdh->id);
        $newdh->save();

        //chuyen sang don hang moi vua duoc tao
        // return redirect()->route('donhangs');
        return redirect()->route('donhangs.show', $newdh->id);
    }

    public function themkhachhang(Request $request)
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


        return response()->json($newkh);
    }

    public function show($id)
    {
        $donhang = Donhang::find($id);
        //tim tat ca san pham thuoc don hang thong qua table donhang_chititets
        // $sanphams = Sanpham::where('donhang_id', $id)->get();
        $sanphams = DB::table('sanphams')
            ->select('sanphams.id as id', 'masp', 'tensp', 'ketcau', 'mota', 'soluong', 'gia')
            ->join('donhang_chitiets', 'donhang_chitiets.sanpham_id', '=', 'sanphams.id')
            ->where('donhang_chitiets.donhang_id', $donhang->id)
            ->get();
        $congdoans = Congdoan::all();
        return view('donhangs.show', ['donhang' => $donhang, 'sanphams' => $sanphams, 'congdoans' => $congdoans]);
    }

    public function edit($id)
    {
        $donhang = Donhang::find($id);
        return view('donhangs.form', ['donhang' => $donhang]);
    }

    public function update($id, Request $request)
    {

        $data = [
            // 'madonhang' => $request->madonhang,
            'ngaygiaohang' => $request->ngaygiaohang,
            // 'loaidonhang' => $request->loaidonhang,
            // 'soluong' => $request->soluong,
            'khachhang_id' => $request->khachhang_id,
            'trangthai' => 'Chưa sản xuất'
        ];

        Donhang::create($data);

        Donhang::find($id)->update($data);

        return redirect()->route('donhangs');
    }

    public function delete($id)
    {
        Donhang::find($id)->delete();

        return redirect()->route('donhangs');
    }

    public function themsp(Request $request, $id)
    {
        // $data = [
        //     'masanpham' => $request->masanpham,
        //     'mota' => $request->mota,
        //     'donhang_id' => $id,
        //     'soluong' => $request->soluong,
        //     'trangthai' => 'Chưa sản xuất'
        // ];
        $ketcau = " {$request->kieusp}-{$request->dai}-{$request->rong}-{$request->cao}-{$request->song}-{$request->kieuin}";
        $mota = " Kiểu: {$request->kieusp}, Kích thước: {$request->dai}x{$request->rong}x{$request->cao}, Sóng: {$request->song}, In: {$request->kieuin}";
        $data = [

            'tensp' => $request->tensp,
            // 'masp' => $request->masp,
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
            // 'trangthai' => '0',
            'congdoan' => '',
            // 'donhang_id' => $id,
            'ketcau' => $ketcau,
            'mota' => $mota,
            // 'gia' => $request->gia,
            // 'soluong' => $request->soluong
        ];

        $newsp = Sanpham::create($data);
        $newsp->masp = "SP" . sprintf("%07d", $newsp->id);
        $newsp->save();

        //cap nhat vao don hang chi tiet
        $data_dh_chitiet = [
            'donhang_id' => $id,
            'sanpham_id' => $newsp->id,
            'soluong' => $request->soluong,
            'gia' => $request->gia,
            'trangthai' => 'Chưa sản xuất'
        ];

        DonhangChitiet::create($data_dh_chitiet);

        return redirect()->route('donhangs.show', $id);
    }

    public function editsp($id, $sid)
    {
        $donhang = Donhang::find($id);
        // $sanphams = Sanpham::where('donhang_id', $id)->get();
        $sanphams = DB::table('sanphams')
            ->select('sanphams.id as id', 'masp', 'tensp', 'ketcau', 'mota', 'soluong', 'gia')
            ->join('donhang_chitiets', 'donhang_chitiets.sanpham_id', '=', 'sanphams.id')
            ->where('donhang_chitiets.donhang_id', $donhang->id)
            ->get();
        $chitiet = DonhangChitiet::where('donhang_id', $id)->where('sanpham_id', $sid)->first();
        // dd($chitiet);
        // exit();
        $congdoans = Congdoan::all();
        // return view('donhangs.show', ['donhang' => $donhang, 'sanphams' => $sanphams, 'congdoans' => $congdoans]);
        $product = Sanpham::find($sid);

        return view('donhangs.show', ['donhang' => $donhang, 'sanphams' => $sanphams, 'congdoans' => $congdoans, 'product' => $product, 'chitiet' => $chitiet]);
    }
    public function updatesp(Request $request, $id, $sid)
    {
        $sanpham = Sanpham::find($sid);
        $chitiet = DonhangChitiet::where('donhang_id', $id)->where('sanpham_id', $sid)->first();
        $ketcau = " {$request->kieusp}-{$request->dai}-{$request->rong}-{$request->cao}-{$request->song}-{$request->kieuin}";
        $mota = " Kiểu: {$request->kieusp}, Kích thước: {$request->dai}x{$request->rong}x{$request->cao}, Sóng: {$request->song}, In: {$request->kieuin}";
        $data = [

            'tensp' => $request->tensp,
            // 'masp' => $request->masp,
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
            // 'trangthai' => '0',
            'congdoan' => '',
            // 'donhang_id' => $id,
            'ketcau' => $ketcau,
            'mota' => $mota,
            // 'gia' => $request->gia,
            // 'soluong' => $request->soluong
        ];

        // $newsp = Sanpham::create($data);
        // $newsp->masp = "SP" . sprintf("%07d", $newsp->id);
        // $newsp->save();
        $sanpham->update($data);

        $data_dh_chitiet = [
            'soluong' => $request->soluong,
            'gia' => $request->gia,
            'trangthai' => 'Chưa sản xuất'
        ];
        $chitiet->update($data_dh_chitiet);

        return redirect()->route('donhangs.show', $id);
    }

    public function deletesp($id, $sid)
    {
        // Sanpham::find($sid)->delete();
        DonhangChitiet::where('donhang_id', $id)->where('sanpham_id', $sid)->first()->delete();

        return redirect()->route('donhangs.show', $id);
    }
}


