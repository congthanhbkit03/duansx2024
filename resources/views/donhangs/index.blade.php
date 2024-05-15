@extends('layouts.app')
 
@section('title', 'Dữ liệu Đơn hàng')
 
@section('contents')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Dữ liệu Đơn hàng</h6>
    </div>
    <div class="card-body">
      <a href="{{ route('donhangs.add') }}" class="btn btn-primary mb-3">Thêm mới đơn hàng</a>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Mã đơn hàng</th>
              <th>Số lượng</th>
              <th>Loại đơn hàng</th>
              <th>Ngày giao hàng</th>
              <th>Trạng thái</th>
              <th>Action</th>                            
            </tr>
          </thead>
          <tbody>
            
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script>
    $(function(){
      var table = $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{route('donhangs')}}",
        columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
          {data: 'madonhang', name: 'madonhang'},
          {data: 'soluong', name: 'soluong'},
          {data: 'loaidonhang', name: 'loaidonhang'},
          {data: 'ngaygiaohang', name: 'ngaygiaohang'},
          {data: 'trangthai', name: 'trangthai'},
          {data: 'action', name: 'action'},
        ]
      });
    })
  </script>
@endsection