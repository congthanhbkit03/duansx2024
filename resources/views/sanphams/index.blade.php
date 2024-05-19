@extends('layouts.app')
 
@section('title', 'Trang liệt kê sản phẩm')
 
@section('contents')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Sản phẩm</h6>
    </div>
    <div class="card-body">
            @if (auth()->user()->level == 'Admin')
        <a href="{{ route('sanphams.add') }}" class="btn btn-primary mb-3">Thêm sản phẩm</a>
      @endif
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Mã SP</th>
              <th style="width: 200px;">Tên SP</th>
              <th>Kiểu SP</th>
              <th>Dài</th>                            
              <th>Rộng</th>                            
              <th>Cao</th>                            
              <th>Sóng</th>                            
              <th>Kiểu in</th>                            
              <th>Số màu</th>                            
              <th>Dài phôi</th>                            
              <th>Rộng phôi</th>                            
              <th>Nắp 1</th>                            
              <th>Cao nắp 1</th>                            
              <th>Nắp 2</th>                            
              <th>Cao năp 2</th>                            
              <th>Nắp 3</th>                            
              <th>Nắp 4</th>                            
              <th>Lằng</th>                            
              <th>Bát</th>                            
              <th>Lề Biên</th>                            
              <th>Khổ giấy</th>                            
              <th>Trọng lượng</th>                            
              <th>Diện tích</th>                            
              <th>Độ Bục</th>                            
              <th>ETC</th>                            
              <th>FTC</th>                            
              <th>Mặt 3</th>                            
              <th>Sóng 3</th>                            
              <th>Mặt 2</th>                            
              <th>Sóng 2</th>                            
              <th>Mặt 1</th>                            
              <th>Sóng 1</th>                            
              <th>Mặt in</th>                            
              <th>Chống thấm</th>                            
              <th>Cán màng</th>                            
              <th>Cán màng</th>                            
              <th>Cán màng</th>                            
              <th>Cán màng</th>                            
              <th>Cán màng</th>                            
              <th>Cán màng</th>                            
              <th>Cán màng</th>                            
              <th>Cán màng</th>                            
              <th>Cán màng</th>                            
              <th>Ghi chú</th>                            
              <th>Mô tả</th>                            
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
        ajax: "{{route('sanphams')}}", //goi ajax de lay du lieu va hien thi
        columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
          {data: 'masp', name: 'masp', width: '300px'},
          {data: 'tensp', name: 'tensp', width: '15%'},
          {data: 'kieusp', name: 'kieusp', width: 300},
          {data: 'dai', name: 'dai'},
          {data: 'rong', name: 'rong'},
          {data: 'cao', name: 'cao'},
          {data: 'song', name: 'song'},
          {data: 'kieuin', name: 'kieuin'},
          {data: 'somau', name: 'somau'},
          {data: 'daiphoi', name: 'daiphoi'},
          {data: 'rongphoi', name: 'rongphoi'},
          {data: 'nap1', name: 'nap1'},
          {data: 'caonap1', name: 'caonap1'},
          {data: 'nap2', name: 'nap2'},
          {data: 'caonap2', name: 'caonap2'},
          {data: 'nap3', name: 'nap3'},
          {data: 'nap4', name: 'nap4'},
          {data: 'lang', name: 'lang'},
          {data: 'bat', name: 'bat'},
          {data: 'lebien', name: 'lebien'},
          {data: 'khogiay', name: 'khogiay'},
          {data: 'trongluong', name: 'trongluong'},
          {data: 'dientich', name: 'dientich'},
          {data: 'dobuc', name: 'dobuc'},
          {data: 'nenect', name: 'nenect'},
          {data: 'nenfct', name: 'nenfct'},
          {data: 'mat3', name: 'mat3'},
          {data: 'song3', name: 'song3'},
          {data: 'mat2', name: 'mat2'},
          {data: 'song2', name: 'song2'},
          {data: 'mat1', name: 'mat1'},
          {data: 'song1', name: 'song1'},
          {data: 'matin', name: 'matin'},
          {data: 'chongtham', name: 'chongtham'},
          {data: 'canmang', name: 'canmang'},
          {data: 'boi', name: 'boi'},
          {data: 'chap', name: 'chap'},
          {data: 'be', name: 'be'},
          {data: 'dan', name: 'dan'},
          {data: 'ghim', name: 'ghim'},
          {data: 'bocot', name: 'bocot'},
          {data: 'quanmang', name: 'quanmang'},
          {data: 'ghichu', name: 'ghichu'},
          {data: 'ketcau', name: 'ketcau'},
          {data: 'mota', name: 'mota'},
          {data: 'action', name: 'action'},
        ]
      });
    })
  </script>
@endsection