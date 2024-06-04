@extends('layouts.app')

@section('title', '')

@push('styles')
    <style>
        .hide {
            display: none;
        }
    </style>
@endpush

@section('contents')
    <!-- <form action="{{ isset($donhang) ? route('donhangs.update', $donhang->id) : route('donhangs.save') }}" method="post">
        @csrf -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h3 class="m-0 font-weight-bold text-primary">Thông tin đơn hàng: {{$donhang->madonhang}}</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            Tên KH:<strong> {{ $donhang->khachhang->tenkh }} </strong>
                        </div>
                        <div class="col">
                            Mã KH:<strong> {{ $donhang->khachhang->makh }} </strong>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            Ngày giao hàng:<strong> {{ $donhang->ngaygiaohang }} </strong>
                        </div>
                        <div class="col">
                            Trạng thái đơn hàng:<strong> {{ $donhang->trangthai }} </strong>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-8">
                            <h6 class="m-0 font-weight-bold text-primary">Các sản phẩm trong đơn hàng</h6>
                        </div>
                        <div class="col-4"> 
                        <button class="btn btn-primary {{ isset($product) ? 'hide' : ''}}" id="themspdaco">Thêm SP đã có</button>
                        <button class="btn btn-success {{ isset($product) ? 'hide' : ''}}" id="themsp">Thêm SP mới</button></div>
                    </div>
                    <div class="row spcu hide">
                        <form action="{{ route('donhangchitiet.save')}}" method="post" style="border: 1px solid blue; padding: 10px; margin: 15px 0;">
                        @csrf   
                        <div class="row">
                        <div class="col-6">
                            <input type="hidden" name="donhang_id" value="{{$donhang->id}}">
                            Nhập mã sản phẩm (không chứa phần chữ - vd: 15)<br>
                            <input type="text" id="masp" class="form-control" name="sanpham_id">
                            <br>
                            Hoặc nhập từ khóa tìm kiếm nếu không nhớ mã sản phẩm:
                            <button type="button" id="searchsp" class="form-control">Mở form tìm kiếm</button>
                        </div>
                        <div class="col-6">
                            Số lượng:
                            <input type="text" name="soluong" id="soluong" class="form-control">
                            <br>
                            Giá:
                            <input type="text" name="gia" id="gia" class="form-control">
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary">Lưu</button>
                        </div>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <form id="formsanpham" class="{{ isset($product) ? '' : 'hide'}}" action="{{ isset($product) ? route('donhangs.show.editsp', [$donhang->id, $product->id]) : route('donhangs.show.themsp', $donhang->id) }}" method="post">
                    <!-- <form id="formsanpham" class="hide" action="{{ route('donhangs.show.themsp', $donhang->id) }}" -->
                        <!-- method="post"> -->
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">
                                            {{ isset($product) ? 'Chỉnh sửa sản phẩm' : 'Thêm sản phẩm vào đơn hàng' }}</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col">
                                                <label for="productname">Tên sản phẩm</label>
                                                <input type="text" class="form-control" id="productname" name="tensp"
                                                    value="{{ isset($product) ? $product->tensp : '' }}">
                                            </div>
                                            <div class="col">
                                                <label for="productname">Số lượng</label>
                                                <input type="text" class="form-control" id="productname" name="soluong"
                                                    value="{{ isset($chitiet) ? $chitiet->soluong : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="productname">Giá</label>
                                                <input type="text" class="form-control" id="productname" name="gia"
                                                    value="{{ isset($chitiet) ? $chitiet->gia : '' }}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="price">Kiểu sản phẩm</label>
                                                <select name="kieusp" class="form-control" >
                                                    <option  {{ isset($product) ? ($product->kieusp == 'Thùng' ? 'selected' : '') : '' }}>Thùng</option>
                                                    <option  {{ isset($product) ? ($product->kieusp == 'Hộp' ? 'selected' : '') : '' }}>Hộp</option>
                                                    <option  {{ isset($product) ? ($product->kieusp == 'Phôi' ? 'selected' : '') : '' }}>Phôi</option>
                                                </select>
                                            </div>

                                            <div class="col">
                                                <label for="price">Dài</label>
                                                <input type="text" class="form-control" id="dai" name="dai"
                                                    value="{{ isset($product) ? $product->dai : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Rộng</label>
                                                <input type="text" class="form-control" id="rong" name="rong"
                                                    value="{{ isset($product) ? $product->rong : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Cao</label>
                                                <input type="text" class="form-control" id="cao" name="cao"
                                                    value="{{ isset($product) ? $product->cao : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Sóng</label>
                                                <select class="form-control" id="song" name="song" value="{{ isset($product) ? $product->song : '' }}">
                                                    <option value="">--Chọn sóng--</option>
                                                    <option {{ isset($product) ? ($product->song == 'E' ? 'selected' : '') : '' }}>E</option>
                                                    <option {{ isset($product) ? ($product->song == 'B' ? 'selected' : '') : '' }}>B</option>
                                                    <option {{ isset($product) ? ($product->song == 'C' ? 'selected' : '') : '' }}>C</option>
                                                    <option {{ isset($product) ? ($product->song == 'A' ? 'selected' : '') : '' }}>A</option>
                                                    <option {{ isset($product) ? ($product->song == 'BE' ? 'selected' : '') : '' }}>BE</option>
                                                    <option {{ isset($product) ? ($product->song == 'BC' ? 'selected' : '') : '' }}>BC</option>
                                                    <option {{ isset($product) ? ($product->song == 'CE' ? 'selected' : '') : '' }}>CE</option>
                                                    <option {{ isset($product) ? ($product->song == 'CBE' ? 'selected' : '') : '' }}>CBE</option>
                                                    <option {{ isset($product) ? ($product->song == 'ABE' ? 'selected' : '') : '' }}>ABE</option>                                                    
                                                </select>
                                            </div>

                                            <div class="col">
                                                <label for="price">Dài phôi</label>
                                                <input type="number" class="form-control" id="daiphoi" name="daiphoi"
                                                    value="{{ isset($product) ? $product->daiphoi : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Rộng phôi</label>
                                                <input type="number" class="form-control" id="rongphoi" name="rongphoi"
                                                    value="{{ isset($product) ? $product->rongphoi : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Kiểu in</label>
                                                <select class="form-control" id="kieuin" name="kieuin" value="{{ isset($product) ? $product->kieuin : '' }}">
                                                    <option>Flexo</option>
                                                    <option>Offset</option>
                                                </select>
                                            </div>

                                            <div class="col">
                                                <label for="price">Số màu</label>
                                                <!-- <input type="number" class="form-control" id="productname"
                                                    name="somau"
                                                    value="{{ isset($product) ? $product->productname : '' }}"> -->
                                                <select name="somau" id="" class="form-control" value="{{ isset($product) ? $product->somau : '' }}">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                    <option>6</option>
                                                    <option>7</option>
                                                    <option>8</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label for="price">Nắp 1</label>
                                                <input type="number" step="0.01" class="form-control" id="nap1"
                                                    name="nap1"
                                                    value="{{ isset($product) ? $product->nap1 : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Cao nắp 1</label>
                                                <input type="number"  step="0.01" class="form-control" id="caonap1"
                                                    name="caonap1"
                                                    value="{{ isset($product) ? $product->caonap1 : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Nắp 2</label>
                                                <input type="number" step="0.01" class="form-control" id="nap2"
                                                    name="nap2"
                                                    value="{{ isset($product) ? $product->nap2 : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Cao nắp 2</label>
                                                <input type="number" step="0.01" class="form-control" id="productname"
                                                    name="caonap2"
                                                    value="{{ isset($product) ? $product->caonap2 : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Nắp 3</label>
                                                <input type="number" step="0.01" class="form-control" id="productname"
                                                    name="nap3"
                                                    value="{{ isset($product) ? $product->nap3 : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Nắp 4</label>
                                                <input type="number" step="0.01" class="form-control" id="productname"
                                                    name="nap4"
                                                    value="{{ isset($product) ? $product->nap4 : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Lằng</label>
                                                <select class="form-control" id="lang" name="lang"">
                                                    <option {{ isset($product) ? ($product->lang == 0 ? 'selected' : '') : '' }}>0</option>
                                                    <option {{ isset($product) ? ($product->lang == 1 ? 'selected' : '') : '' }}>1</option>
                                                    <option {{ isset($product) ? ($product->lang == 2 ? 'selected' : '') : '' }}>2</option>
                                                    <option {{ isset($product) ? ($product->lang == 3 ? 'selected' : '') : '' }}>3</option>
                                                    <option {{ isset($product) ? ($product->lang == 4 ? 'selected' : '') : '' }}>4</option>
                                                </select>
                                               
                                            </div>
                                      
                                            <div class="col">
                                                <label for="price">Bát</label>
                                                <select class="form-control" id="bat" name="bat">
                                                    <option {{ isset($product) ? ($product->bat == 0 ? 'selected' : '') : '' }}>0</option>
                                                    <option {{ isset($product) ? ($product->bat == 0 ? 'selected' : '') : '' }}>1</option>
                                                    <option {{ isset($product) ? ($product->bat == 0 ? 'selected' : '') : '' }}>2</option>
                                                    <option {{ isset($product) ? ($product->bat == 0 ? 'selected' : '') : '' }}>3</option>
                                                    <option {{ isset($product) ? ($product->bat == 0 ? 'selected' : '') : '' }}>4</option>
                                                    <option {{ isset($product) ? ($product->bat == 0 ? 'selected' : '') : '' }}>5</option>
                                                    <option {{ isset($product) ? ($product->bat == 0 ? 'selected' : '') : '' }}>6</option>
                                                    <option {{ isset($product) ? ($product->bat == 0 ? 'selected' : '') : '' }}>7</option>
                                                    <option {{ isset($product) ? ($product->bat == 0 ? 'selected' : '') : '' }}>8</option>
                                                </select>
                                               
                                            </div>

                                            
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="khogiay">Khổ giấy:</label>
                                                <select class="form-control" name="khogiay" id="khogiay" value="{{ isset($product) ? $product->khogiay : '' }}">
                                                    <!-- <option>A4</option>
                                                    <option>A3</option>
                                                    <option>A2</option>
                                                    <option>B4</option>
                                                    <option>B3</option>
                                                    <option>B2</option> -->
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label for="price">Lề biên</label>
                                                <input type="number" class="form-control" id="lebien"
                                                    name="lebien"
                                                    value="{{ isset($product) ? $product->lebien : '' }}">
                                            </div>
                                            <div class="col">
                                                <label for="price">Trọng lượng</label>
                                                <input type="number" class="form-control" id="trongluong"
                                                    name="trongluong"
                                                    value="{{ isset($product) ? $product->trongluong : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Diện tích</label>
                                                <input type="number" class="form-control" id="dientich"
                                                    name="dientich"
                                                    value="{{ isset($product) ? $product->dientich : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Đổ bục</label>
                                                <input type="number" class="form-control" id="productname"
                                                    name="dobuc"
                                                    value="{{ isset($product) ? $product->dobuc : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Nén ECT</label>
                                                <input type="number" class="form-control" id="productname"
                                                    name="nenect"
                                                    value="{{ isset($product) ? $product->nenect : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Nén FCT</label>
                                                <input type="number" class="form-control" id="productname"
                                                    name="nenfct"
                                                    value="{{ isset($product) ? $product->nenfct : '' }}">
                                            </div>
                                            </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="price">Mặt 3</label>
                                                <input type="text" class="form-control" id="mat3"
                                                    name="mat3"
                                                    value="{{ isset($product) ? $product->mat3 : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Sóng 3</label>
                                                <input type="text" class="form-control" id="song3"
                                                    name="song3"
                                                    value="{{ isset($product) ? $product->song3 : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Mặt 2</label>
                                                <input type="text" class="form-control" id="mat2"
                                                    name="mat2"
                                                    value="{{ isset($product) ? $product->mat2 : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Sóng 2</label>
                                                <input type="text" class="form-control" id="song2"
                                                    name="song2"
                                                    value="{{ isset($product) ? $product->song2 : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Mặt 1</label>
                                                <input type="text" class="form-control" id="mat1"
                                                    name="mat1"
                                                    value="{{ isset($product) ? $product->mat1 : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Sóng 1</label>
                                                <input type="text" class="form-control" id="song1"
                                                    name="song1"
                                                    value="{{ isset($product) ? $product->song1 : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Mặt in</label>
                                                <input type="text" class="form-control" id="matin"
                                                    name="matin"
                                                    value="{{ isset($product) ? $product->matin : '' }}">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label for="price">Chống thấm</label>
                                                <select name="chongtham" class="form-control" id="chongtham"  value="{{ isset($product) ? $product->chongtham : '' }}">
                                                    <option>0</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                </select>
                                                <!-- <input type="number" class="form-control" id="productname" name="chongtham" value="{{ isset($product) ? $product->productname : '' }}"> -->
                                            </div>

                                            <div class="col">
                                                <label for="price">Cán màng</label>
                                                <select type="number" class="form-control" id="canmang"
                                                    name="canmang"
                                                    value="{{ isset($product) ? $product->canmang : '' }}">
                                                        <option>0</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                    </select>
                                            </div>

                                            <div class="col">
                                                <label for="price">Bồi</label>
                                                <select type="number" class="form-control" id="boi"
                                                    name="boi"
                                                    value="{{ isset($product) ? $product->boi : '' }}">
                                                        <option>0</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                    </select>
                                            </div>

                                            <div class="col">
                                                <label for="price">Chạp</label>
                                                <select type="number" class="form-control" id="chap"
                                                    name="chap"
                                                    value="{{ isset($product) ? $product->chap : '' }}">
                                                        <option>0</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                    </select>
                                            </div>

                                            <div class="col">
                                                <label for="price">Bế</label>
                                                <select type="number" class="form-control" id="be"
                                                    name="be"
                                                    value="{{ isset($product) ? $product->be : '' }}">
                                                        <option>0</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                    </select>
                                            </div>

                                            <div class="col">
                                                <label for="price">Dán</label>
                                                <select type="number" class="form-control" id="dan"
                                                    name="dan"
                                                    value="{{ isset($product) ? $product->dan : '' }}">
                                                        <option>0</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                    </select>
                                            </div>

                                            <div class="col">
                                                <label for="price">Ghim</label>
                                                <select type="number" class="form-control" id="ghim"
                                                    name="ghim"
                                                    value="{{ isset($product) ? $product->ghim : '' }}">
                                                        <option>0</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                    </select>
                                            </div>

                                            <div class="col">
                                                <label for="price">Bó cột</label>
                                                <input type="number" class="form-control" id="productname"
                                                    name="bocot"
                                                    value="{{ isset($product) ? $product->bocot : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Quấn màng</label>
                                                <select type="number" class="form-control" id="quanmang"
                                                    name="quanmang"
                                                    value="{{ isset($product) ? $product->quanmang : '' }}">
                                                        <option>0</option>
                                                        <option>1</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="price">Ghi chú</label>
                                                <textarea name="ghichu" class="form-control">

                                                </textarea>
                                            </div>
                                        </div>
                                    </div> <!--  end card body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        
                                        <button type="button" class="btn btn-warning {{ isset($product) ? 'hide' : ''}}" id="cancel">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Ma SP</th>
                                    <th>Tên SP</th>
                                    <th>Kết cấu</th>
                                    <th>Mô tả</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    <th>Thành tiền</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($no = 1)
                                @foreach ($sanphams as $row)
                                    <tr>
                                        <th>{{ $no++ }}</th>
                                        <th>{{ $row->masp }}</th>
                                        <td>{{ $row->tensp }}</td>
                                        <td>{{ $row->ketcau }}</td>
                                        <td>{{ $row->mota }}</td>
                                        <td>{{ $row->soluong }}</td>
                                        <td>{{ $row->gia }}</td>
                                        <td>{{ $row->soluong * $row->gia }}</td>
                                        <td>
                                            <a href="{{ route('donhangs.show.editsp', [$donhang->id, $row->id])}}" class="btn btn-warning">Sửa</a>
                                            <a href="{{ route('donhangs.show.deletesp', [$donhang->id, $row->id])}}" class="btn btn-danger">Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- </form> -->


    <!-- Modal 1-->
    <div class="modal fade" id="cauhinhForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thiết lập quy trình cho sản phẩm có ID: <span
                            id="idsp"></span></h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @foreach ($congdoans as $cd)
                        <div class="row">
                            <div class="col-md-2"><input type="checkbox" value="{{ $cd->id }}" class="cd"
                                    id="{{ $cd->id }}" /></div>
                            <div class="col-md-10"> <label for="{{ $cd->id }}">{{ $cd->tencongdoan }}</label>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save">Save changes</button>
                </div>
            </div>
        </div>
    </div>

        <!-- Modal 1-->
    <div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Các sản phẩm đã mua </h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered" style="heght: 400px;">
                        <thead>
                            <th>Mã SP</th>
                            <th>Tên SP</th>
                            <th>Kết Cấu</th>
                            <th>Chọn</th>
                        </thead>
                        <tbody  id="dssp"></tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        //xu ly onchange tren input
        const daiInp = document.querySelector('#dai');
        const rongInp = document.querySelector('#rong');
        const caoInp = document.querySelector('#cao');
        const daiphoi = document.querySelector('#daiphoi')
        rongInp.addEventListener('input', function(e) {
            if (rongInp.value.length > 0 && !isNaN(daiInp.value) && !isNaN(rongInp.value)) {
                //2 truong co du lieu la so thi moi tinh
                daiphoi.value = (parseInt(daiInp.value) + parseInt(rongInp.value)) * 2 + 35;
            }
        })

        //thay doi caoInput -> cao nap
        const caonapInp =document.querySelector('#caonap1');
        caoInp.addEventListener('input', function(e){
            caonapInp.value = e.target.value;
        })

        const songSelect =document.querySelector('#song')
        const rongphoig = document.querySelector('#rongphoi')
        const nap1 =document.querySelector('#nap1')
        const nap2 =document.querySelector('#nap2')
        const dientich =document.querySelector('#dientich')
        const bat =document.querySelector('#bat')
        //thay doi sóng => thay đổi bù => cập nhật rộng phôi, nap1, nap2
        songSelect.addEventListener('change', function(e){
            console.log(this.value);
            axios.get('{{route('getcauhinh', 'bu')}}')
            .then(response => {
                //lay cau hinh bu tu db cau hinh
                // console.log(response.data);
                let buconf = JSON.parse(response.data.value);
                let bu = 0;
                console.log(buconf);
                if (this.value.length == 1){
                    bu =buconf.song1;
                } else if (this.value.length == 2){
                    bu =buconf.song2;
                } else if (this.value.length == 3){
                    bu =buconf.song3;
                } else {
                    bu = 0;
                }
                console.log(bu);

                //rongphoi = Rong + Cao + Bu
                rongphoig.value = parseInt(rong.value) + parseInt(cao.value) + parseInt(bu);

                //cap nhat nap1 = nap2 dua vao rong va bu
                nap1.value = (parseFloat(rongInp.value) + parseFloat(bu)) / 2;
                nap2.value = (parseFloat(rongInp.value) +parseFloat( bu)) / 2;

                dientich.value = daiphoi.value * rongphoi.value;
                //rong phoi thay doi => thay doi dientich


            })
            .catch(err => {
                alert("Khong truy cap duoc thong tin cau hinh bu song")
            })
        })

        //load du lieu vao select Khogiay
        const selectKhogiay = document.querySelector('#khogiay');
        //get khogiay
        axios.get('{{ route('getcauhinh', 'khogiay')}}')
        .then( response => {
            console.log(response);
            const tmp =response.data.value;
            options = tmp.split(',');
            console.log(options);
            options.forEach(option => {
                //tao cac option tu server
                const opt  =document.createElement("option");
                opt.innerText = option;
                selectKhogiay.append(opt);

            })

        })

        khogiay.addEventListener('change', function(e){
            //lebien = khogiay - (rongphoi x bat)
            document.querySelector('#lebien').value =khogiay.value - (rongphoi.value * bat.value);
        })
    </script>
    <script>
        const themspbt = document.querySelector('#themsp');
        const cancelbt = document.querySelector('#cancel');
        const formsp = document.querySelector('#formsanpham');
        themspbt.addEventListener('click', function(e) {
            console.log("EEEEEEEEEE");
            formsp.classList.remove('hide');
            //an button them
            themspbt.classList.add('hide')
        })

        cancelbt.addEventListener('click', function() {
            formsp.classList.add('hide');
            themspbt.classList.remove('hide')
        })
    </script>

    <script>
        //xu ly cau hinh
        // const cauhinh = document.querySelector('#cauhinhsp');
        // const cauhinhModal = new bootstrap.Modal( document.querySelector('#cauhinhForm'));
        // cauhinh.addEventListener('click', function(e){
        // cauhinhModal.show();//('show')
        // })
        function cauhinhSX(id) {
            const cauhinhModal = new bootstrap.Modal(document.querySelector('#cauhinhForm'));
            document.querySelector('#idsp').innerText = id;
            axios.get('/sanphams/' + id + '/congdoan')
                .then(data => {
                    const cds = data.data.congdoan;
                    //cac cong doan cua san pham duoc chon
                    const cdArr = cds.split(',');
                    console.log(cdArr);
                    //lay tat ca cac input condoan - so sanh' value neu thuoc mang nay thi them thuoc tinh check
                    const allCongdoan = document.querySelectorAll('.cd');
                    allCongdoan.forEach(cdEl => {
                        if (cdArr.includes(cdEl.value)) { //neu value co trong mang thi them checked cho no
                            console.log("CHUUUUUUUUUUUa");
                            // cdEl.setAttribute("checked", true);
                            cdEl.checked = true;
                        } else {
                            cdEl.checked = false;
                        }
                    });
                    cauhinhModal.show(); //('show')

                })
        }
    </script>

    <script>
        //xu ly khi nhan nut save
        document.querySelector('#save').addEventListener('click', () => {
            let data = [];
            const allCongdoan = document.querySelectorAll('.cd');
            allCongdoan.forEach(cdEl => {
                if (cdEl.checked) { //neu value co trong mang thi them checked cho no
                    data.push(cdEl.value)
                }
                console.log(data);
            })
        });
    </script>

    <script>
        //xu ly nhan nut them san pham da ton tai
        const themspdaco =document.querySelector('#themspdaco');
        const spcu =document.querySelector('.spcu');
        themspdaco.addEventListener('click', (e) => {
            spcu.classList.remove('hide');
        })

        const modal2 = new bootstrap.Modal(document.querySelector('#modal2'));
        const dssp = document.querySelector('#dssp');
        //input cho search sanpham
        document.querySelector('#searchsp').addEventListener('click', (e) => {
            dssp.innerHTML = "";
            //fetch api - tim cac san pham da mua cua khach hang nay
            //$donhang->khachhang->makh
            axios('{{ route('timsptheomakh', [$donhang->khachhang->id, $donhang->id])}}')
            .then(response => {
                console.log(response);
                //hien thi trong modal2
                modal2.show();

                response.data.forEach(sp => {
                    const tr =document.createElement("tr")
                    tr.innerHTML = `
                        <td>${sp.masp}</td>
                        <td>${sp.tensp}</td>
                        <td>${sp.ketcau}</td>
                        <td>${sp.ketcau}</td>
                        <td><button type="button" onclick="chonSP(${sp.id})">Chọn</button></td>
                    `
                    dssp.append(tr);
                })
            })
        })

        function chonSP(id){
            document.querySelector('#masp').value = id;
            modal2.hide();
        }
    </script>
@endpush
