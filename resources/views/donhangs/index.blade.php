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
              <th>Ten KH</th>
              <th>Ngày giao hàng</th>
              <th>Trạng thái</th>
              <th>Ngày tạo</th>
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
          {data: 'tenkh', name: 'tenkh'},
          {data: 'ngaygiaohang', name: 'ngaygiaohang'},
          {data: 'trangthai', name: 'trangthai'},
          {data: 'created_at', name: 'created_at'},
          {data: 'action', name: 'action'},
        ]
      });
    })
  </script>
@endsection