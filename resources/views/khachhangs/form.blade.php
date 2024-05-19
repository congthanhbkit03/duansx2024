@extends('layouts.app')
 
@section('title', 'Form Khach hang')
 
@section('contents')
<form action="{{ isset($khachhang) ? route('khachhangs.update', $khachhang->id) : route('khachhangs.save') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($khachhang) ? 'Form Edit khachhang' : 'Form Them moi khachhang' }}</h6>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col">
              <div class="form-group">
              <label for="item_code">Mã Khách hàng</label>
              <input type="text" class="form-control" id="item_code" name="makh" value="{{ isset($khachhang) ? $khachhang->item_code : '' }}">
            </div>

            <div class="form-group">
              <label for="khachhangname">Tên Khách hàng</label>
              <input type="text" class="form-control" id="khachhangname" name="tenkh" value="{{ isset($khachhang) ? $khachhang->khachhangname : '' }}">
            </div>
              </div>
              <div class="col">
              <div class="form-group">
              <label for="price">Liên hệ</label>
              <input type="text" class="form-control" id="price" name="lienhe" value="{{ isset($khachhang) ? $khachhang->price : '' }}">
            </div>

            <div class="form-group">
              <label for="price">Số điện thoại</label>
              <input type="text" class="form-control" id="price" name="sdt" value="{{ isset($khachhang) ? $khachhang->price : '' }}">
            </div>
              </div>
              <div class="col">
              <div class="form-group">
              <label for="price">Địa chỉ</label>
              <input type="text" class="form-control" id="price" name="diachi" value="{{ isset($khachhang) ? $khachhang->price : '' }}">
            </div>

            <div class="form-group">
              <label for="price">Mã số thuế</label>
              <input type="text" class="form-control" id="price" name="masothue" value="{{ isset($khachhang) ? $khachhang->price : '' }}">
            </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                <label for="price">Giao hàng 1</label>
                <input type="text" class="form-control" id="price" name="giaohang1" value="{{ isset($khachhang) ? $khachhang->price : '' }}">
              </div>
              </div>
              <div class="col">
              <div class="form-group">
              <label for="price">Số điện thoại 1</label>
              <input type="text" class="form-control" id="price" name="sdt1" value="{{ isset($khachhang) ? $khachhang->price : '' }}">
            </div>
              </div>
           <div class="col">
           <div class="form-group">
              <label for="price">Số km 1</label>
              <input type="text" class="form-control" id="price" name="km1" value="{{ isset($khachhang) ? $khachhang->price : '' }}">
            </div>
           </div>

            </div>
            <div class="row">
              <div class="col">
              <div class="form-group">
              <label for="price">Giao hàng 2</label>
              <input type="text" class="form-control" id="price" name="giaohang2" value="{{ isset($khachhang) ? $khachhang->price : '' }}">
            </div>
              </div>
              <div class="col"><div class="form-group">
              <label for="price">Số điện thoại 2</label>
              <input type="text" class="form-control" id="price" name="sdt2" value="{{ isset($khachhang) ? $khachhang->price : '' }}">
            </div></div>
              <div class="col">
              <div class="form-group">
              <label for="price">Số km 2</label>
              <input type="text" class="form-control" id="price" name="km2" value="{{ isset($khachhang) ? $khachhang->price : '' }}">
            </div>
              </div>
            </div>           
            
            <div class="form-group">
              <label for="price">Ghi chú</label>
              <textarea name="ghichu" class="form-control">{{ isset($khachhang) ? $khachhang->price : '' }}</textarea>
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