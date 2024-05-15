@extends('layouts.app')
 
@section('title', 'Form products')
 
@section('contents')
<form action="{{ isset($product) ? route('sanphams.update', $product->id) : route('sanphams.save') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($product) ? 'Form Edit product' : 'Form plus product' }}</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="item_code">Mã sản phẩm</label>
              <input type="text" class="form-control" id="item_code" name="masp" value="{{ isset($product) ? $product->item_code : '' }}">
            </div>
            <div class="form-group">
              <label for="productname">Tên sản phẩm</label>
              <input type="text" class="form-control" id="productname" name="tensp" value="{{ isset($product) ? $product->productname : '' }}">
            </div>
            <div class="form-group">
              <label for="id_category">Thuộc đơn hàng có mã:</label>
              <input type="text" class="form-control" id="productname" name="donhang_id" value="{{ isset($product) ? $product->productname : '' }}">
            </div>

            <div class="form-group">
              <label for="price">Kiểu sản phẩm</label>
              <select name="kieusp">
                <option>Hộp</option>
                <option>Miếng</option>
              </select>
            </div>

            <div class="form-group">
              <label for="price">Dài</label>
              <input type="text" class="form-control" id="productname" name="dai" value="{{ isset($product) ? $product->productname : '' }}">
            </div>

            <div class="form-group">
              <label for="price">Rộng</label>
              <input type="text" class="form-control" id="productname" name="rong" value="{{ isset($product) ? $product->productname : '' }}">
            </div>

            <div class="form-group">
              <label for="price">Cao</label>
              <input type="text" class="form-control" id="productname" name="cao" value="{{ isset($product) ? $product->productname : '' }}">
            </div>

            <div class="form-group">
              <label for="price">Sóng</label>
              <select class="form-control" name="song">
                <option>BC</option>
                <option>AC</option>
              </select>
            </div>

            <div class="form-group">
              <label for="price">Kiểu in</label>
              <select class="form-control" name="kieuin">
                <option>Flexo</option>
                <option>Offset</option>
              </select>
            </div>

            <div class="form-group">
              <label for="price">Số màu</label>
              <input type="number" class="form-control" id="productname" name="somau" value="{{ isset($product) ? $product->productname : '' }}">
            </div>

            <div class="form-group">
              <label for="price">Ghi chú</label>
              <textarea name="ghichu" class="form-control">

              </textarea>
            </div>

            <div class="form-group">
              <label for="price">Dài phôi</label>
              <input type="number" class="form-control" id="productname" name="daiphoi" value="{{ isset($product) ? $product->productname : '' }}">
            </div>

            <div class="form-group">
              <label for="price">Rộng phôi</label>
              <input type="number" class="form-control" id="productname" name="rongphoi" value="{{ isset($product) ? $product->productname : '' }}">
            </div>

            <div class="form-group">
              <label for="price">Nắp 1</label>
              <input type="number" class="form-control" id="productname" name="nap1" value="{{ isset($product) ? $product->productname : '' }}">
            </div>

            <div class="form-group">
              <label for="price">Cao nắp 1</label>
              <input type="number" class="form-control" id="productname" name="caonap1" value="{{ isset($product) ? $product->productname : '' }}">
            </div>

            <div class="form-group">
              <label for="price">Nắp 2</label>
              <input type="number" class="form-control" id="productname" name="nap2" value="{{ isset($product) ? $product->productname : '' }}">
            </div>

            <div class="form-group">
              <label for="price">Cao nắp 2</label>
              <input type="number" class="form-control" id="productname" name="caonap2" value="{{ isset($product) ? $product->productname : '' }}">
            </div>

            <div class="form-group">
              <label for="price">Nắp 3</label>
              <input type="number" class="form-control" id="productname" name="nap3" value="{{ isset($product) ? $product->productname : '' }}">
            </div>

            <div class="form-group">
              <label for="price">Nắp 4</label>
              <input type="number" class="form-control" id="productname" name="nap4" value="{{ isset($product) ? $product->productname : '' }}">
            </div>

            <div class="form-group">
              <label for="price">Lằng</label>
              <input type="number" class="form-control" id="productname" name="lang" value="{{ isset($product) ? $product->productname : '' }}">
            </div>

            <div class="form-group">
              <label for="price">Bát</label>
              <input type="number" class="form-control" id="productname" name="bat" value="{{ isset($product) ? $product->productname : '' }}">
            </div>

            <div class="form-group">
              <label for="price">Lề biên</label>
              <input type="number" class="form-control" id="productname" name="lebien" value="{{ isset($product) ? $product->productname : '' }}">
            </div>


            <div class="form-group">
              <label for="khogiay">Khổ giấy:</label>
              <select class="form-control" name="khogiay">
                <option>A4</option>
                <option>A3</option>
                <option>A2</option>
                <option>B4</option>
                <option>B3</option>
                <option>B2</option>
              </select>
            </div>
              <div class="form-group">
              <label for="price">Trọng lượng</label>
              <input type="number" class="form-control" id="productname" name="trongluong" value="{{ isset($product) ? $product->productname : '' }}">
            </div>

            <div class="form-group">
              <label for="price">Diện tích</label>
              <input type="number" class="form-control" id="productname" name="dientich" value="{{ isset($product) ? $product->productname : '' }}">
            </div>

            <div class="form-group">
              <label for="price">Đổ bục</label>
              <input type="number" class="form-control" id="productname" name="dobuc" value="{{ isset($product) ? $product->productname : '' }}">
            </div>

            <div class="form-group">
              <label for="price">Nén ECT</label>
              <input type="number" class="form-control" id="productname" name="nenect" value="{{ isset($product) ? $product->productname : '' }}">
            </div>

            <div class="form-group">
              <label for="price">Nén FCT</label>
              <input type="number" class="form-control" id="productname" name="nenfct" value="{{ isset($product) ? $product->productname : '' }}">
            </div>

            <div class="form-group">
              <label for="price">Mặt 3</label>
              <input type="number" class="form-control" id="productname" name="mat3" value="{{ isset($product) ? $product->productname : '' }}">
            </div>

            <div class="form-group">
              <label for="price">Sóng 3</label>
              <input type="number" class="form-control" id="productname" name="song3" value="{{ isset($product) ? $product->productname : '' }}">
            </div>

            <div class="form-group">
              <label for="price">Mặt 2</label>
              <input type="number" class="form-control" id="productname" name="mat2" value="{{ isset($product) ? $product->productname : '' }}">
            </div>

            <div class="form-group">
              <label for="price">Sóng 2</label>
              <input type="number" class="form-control" id="productname" name="song2" value="{{ isset($product) ? $product->productname : '' }}">
            </div>

            <div class="form-group">
              <label for="price">Mặt 1</label>
              <input type="number" class="form-control" id="productname" name="mat1" value="{{ isset($product) ? $product->productname : '' }}">
            </div>

            <div class="form-group">
              <label for="price">Sóng 1</label>
              <input type="number" class="form-control" id="productname" name="song1" value="{{ isset($product) ? $product->productname : '' }}">
            </div>

            <div class="form-group">
              <label for="price">Mặt in</label>
              <input type="number" class="form-control" id="productname" name="matin" value="{{ isset($product) ? $product->productname : '' }}">
            </div>

            <div class="form-group">
              <label for="price">Chống thấm</label>
              <select name="chongtham" id="">
                <option >Có</option>
                <option >Không</option>
              </select>
              <!-- <input type="number" class="form-control" id="productname" name="chongtham" value="{{ isset($product) ? $product->productname : '' }}"> -->
            </div>

            <div class="form-group">
              <label for="price">Cán màng</label>
              <input type="number" class="form-control" id="productname" name="canmang" value="{{ isset($product) ? $product->productname : '' }}">
            </div>

            <div class="form-group">
              <label for="price">Bồi</label>
              <input type="number" class="form-control" id="productname" name="boi" value="{{ isset($product) ? $product->productname : '' }}">
            </div>

            <div class="form-group">
              <label for="price">Chạp</label>
              <input type="number" class="form-control" id="productname" name="chap" value="{{ isset($product) ? $product->productname : '' }}">
            </div>

            <div class="form-group">
              <label for="price">Bế</label>
              <input type="number" class="form-control" id="productname" name="be" value="{{ isset($product) ? $product->productname : '' }}">
            </div>

            <div class="form-group">
              <label for="price">Dán</label>
              <input type="number" class="form-control" id="productname" name="dan" value="{{ isset($product) ? $product->productname : '' }}">
            </div>

            <div class="form-group">
              <label for="price">Ghim</label>
              <input type="number" class="form-control" id="productname" name="ghim" value="{{ isset($product) ? $product->productname : '' }}">
            </div>

            <div class="form-group">
              <label for="price">Bó cột</label>
              <input type="number" class="form-control" id="productname" name="bocot" value="{{ isset($product) ? $product->productname : '' }}">
            </div>

            <div class="form-group">
              <label for="price">Quấn màng</label>
              <input type="number" class="form-control" id="productname" name="quanmang" value="{{ isset($product) ? $product->productname : '' }}">
            </div>

           
           
            </div>  <!--  end card body -->

         

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection