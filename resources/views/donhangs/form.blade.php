@extends('layouts.app')
 
@section('title', 'Form Thêm Đơn Hàng')
 
@section('contents')
<form action="{{ isset($donhang) ? route('donhangs.update', $donhang->id) : route('donhangs.save') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($donhang) ? 'Form Edit donhang' : 'Form plus donhang' }}</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="item_code">Mã Đơn hàng</label>
              <input type="text" class="form-control" id="madonhang" name="madonhang" value="{{ isset($donhang) ? $donhang->madonhang : '' }}">
            </div>
            <div class="form-group">
              <label for="donhangname">Số lượng</label>
              <input type="text" class="form-control" id="soluong" name="soluong" value="{{ isset($donhang) ? $donhang->soluong : '' }}">
            </div>
           
            <div class="form-group">
              <label for="price">Loại đơn hàng</label>
              <!-- <input type="number" class="form-control" id="loaidonhang" name="loaidonhang" value="{{ isset($donhang) ? $donhang->loaidonhang : '' }}"> -->
              <select id="loaidonhang" name="loaidonhang">
                <option>Đầy đủ</option>
                <option>Không đầy đủ</option>
              </select>
            </div>

            <div class="form-group">
              <label for="donhangname">Ngày giao hàng</label>
              <input type="date" class="form-control" id="ngaygiaohang" name="ngaygiaohang" value="{{ isset($donhang) ? $donhang->ngaygiaohang : '' }}">
            </div>

          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection