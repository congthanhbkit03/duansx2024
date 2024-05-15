@extends('layouts.app')
 
@section('title', 'Thông tin Đơn Hàng')

@push('scripts')
  <style>
  .hide{
  display: none;
  }
  </style>
@endpush

@section('contents')
<!-- <form action="{{ isset($donhang) ? route('donhangs.update', $donhang->id) : route('donhangs.save') }}" method="post">
    @csrf -->
    <div class="row">
      <div class="col-4">
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
      <div class="col-8">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Các sản phẩm trong đơn hàng</h6>
            <button class="btn btn-success" id="themsp">Thêm sản phẩm</button>
          </div>
          <div class="card-body">
            <!-- <form id="formsanpham" class="hide" action="{{ isset($donhang) ? route('donhangs.update', $donhang->id) : route('donhangs.save') }}" method="post"> -->
            <form id="formsanpham" class="hide" action="{{ route('donhangs.show.themsp', $donhang->id) }}" method="post">
            @csrf
              <div class="row"><label for="">Ma san pham</label>
              <input type="text" name="masanpham"></div>
              <div class="row"><label for="">Số lượng</label>
              <input type="text" name="soluong" id=""></div>
              <div class="row"><label for="">Mô tả</label>
              <textarea name="mota">

              </textarea></div>
              <div class="row"><button class="btn btn-primary">Lưu</button></div>
              
              
              
              
            </form>
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Mã sản phẩm</th>
                    <th>Mô tả sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @php($no = 1)
                  @foreach ($sanphams as $row)
          <tr>
          <th>{{ $no++ }}</th>
          <td>{{ $row->masanpham }}</td>
          <td>{{ $row->mota }}</td>
          <td>{{ $row->soluong }}</td>
          <td>
            <button class="btn btn-success" 
            id="cauhinhsp"
            onclick="cauhinhSX({{$row->id}})">Cấu hình</button>
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


<!-- Modal -->
<div class="modal fade" id="cauhinhForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thiết lập quy trình cho sản phẩm có ID: <span id="idsp"></span></h5>
       
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @foreach ($congdoans as $cd)
      <div class="row">
      <div class="col-md-2"><input type="checkbox" value="{{$cd->id}}" class="cd" id="{{$cd->id}}"/></div>
      <div class="col-md-10">  <label for="{{$cd->id}}">{{$cd->tencongdoan}}</label></div>
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

@endsection

@push('scripts')
  <script>
    const themspbt = document.querySelector('#themsp');
    const formsp = document.querySelector('#formsanpham');
    themspbt.addEventListener('click', function(e){
    console.log("EEEEEEEEEE");
    formsp.classList.remove('hide');
    })
  </script>

  <script>
    //xu ly cau hinh
    // const cauhinh = document.querySelector('#cauhinhsp');
    // const cauhinhModal = new bootstrap.Modal( document.querySelector('#cauhinhForm'));
    // cauhinh.addEventListener('click', function(e){
    // cauhinhModal.show();//('show')
    // })
    function cauhinhSX(id){
    const cauhinhModal = new bootstrap.Modal( document.querySelector('#cauhinhForm'));
    document.querySelector('#idsp').innerText = id;
    axios.get('/sanphams/'+id+'/congdoan')
    .then(data => {
    const cds = data.data.congdoan;
    //cac cong doan cua san pham duoc chon
    const cdArr = cds.split(',');
    console.log(cdArr);
    //lay tat ca cac input condoan - so sanh' value neu thuoc mang nay thi them thuoc tinh check
    const allCongdoan = document.querySelectorAll('.cd');
    allCongdoan.forEach(cdEl => {
    if (cdArr.includes(cdEl.value)){ //neu value co trong mang thi them checked cho no
    console.log("CHUUUUUUUUUUUa");
    // cdEl.setAttribute("checked", true);
  cdEl.checked = true;
    } else {
    cdEl.checked = false;
    }
    });
    cauhinhModal.show();//('show')

    })
    }
  </script>

  <script>
    //xu ly khi nhan nut save
    document.querySelector('#save').addEventListener('click', () => {
    let data = [];
    const allCongdoan = document.querySelectorAll('.cd');
    allCongdoan.forEach(cdEl => {
    if (cdEl.checked){ //neu value co trong mang thi them checked cho no
    data.push(cdEl.value)
    }
    console.log(data);
    })
    });

  </script>
@endpush