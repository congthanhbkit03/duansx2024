@extends('layouts.app')
 
@section('title', 'Dữ liệu khách hàng')
 
@section('contents')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Dữ liệu khách hàng</h6>
    </div>
    <div class="card-body">
            @if (auth()->user()->level == 'Admin')
        <a href="{{ route('products.add') }}" class="btn btn-primary mb-3">Thêm mới khách hàng</a>
      @endif
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Mã KH</th>
              <th>Tên KH</th>
              <th>Người tạo</th>
              <th>Địa chỉ</th>                            
              <th>Mã số thuế</th>                            
              <th>Giao hàng 1</th>                            
              <th>SĐT 1</th>                            
              <th>Số KM 1</th>                            
              <th>Giao hàng 2</th>                            
              <th>SĐT 2</th>                            
              <th>Số KM 2</th>                            
              <th>Ghi chú</th>                            
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
        ajax: "{{route('khachhangs')}}",
        columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
          {data: 'makh', name: 'makh'},
          {data: 'tenkh', name: 'tenkh'},
          {data: 'nguoitao', name: 'nguoitao'},
          {data: 'diachi', name: 'diachi'},
          {data: 'masothue', name: 'masothue'},
          {data: 'giaohang1', name: 'giaohang1'},
          {data: 'sdt1', name: 'sdt1'},
          {data: 'km1', name: 'km1'},
          {data: 'giaohang2', name: 'giaohang2'},
          {data: 'sdt2', name: 'sdt2'},
          {data: 'km2', name: 'km2'},
          {data: 'ghichu', name: 'ghichu'},
          {data: 'action', name: 'action'},
        ]
      });
    })
  </script>
@endsection