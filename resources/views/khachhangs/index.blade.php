@extends('layouts.app')
 
@section('title', 'Dữ liệu khách hàng')

@push('styles')
  <style>
  #modal{
    /* width: 85%; */
  }
  </style>

@endpush
@section('contents')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Dữ liệu khách hàng</h6>
    </div>
    <div class="card-body">
            @if (auth()->user()->level == 'Admin')
        <a href="{{ route('khachhangs.add') }}" class="btn btn-primary mb-3">Thêm mới khách hàng</a>
      @endif
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Mã KH</th>
              <th>Tên KH</th>
              <!-- <th>Người tạo</th> -->
              <th>Địa chỉ</th>                            
              <!-- <th>Mã số thuế</th>                            
              <th>Giao hàng 1</th>                            
              <th>SĐT 1</th>                            
              <th>Số KM 1</th>                            
              <th>Giao hàng 2</th>                            
              <th>SĐT 2</th>                            
              <th>Số KM 2</th>                            
              <th>Ghi chú</th>                             -->
              <th>Action</th>
                            
            </tr>
          </thead>
          <tbody>
            
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="width: 1000px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thông tin chi tiết KH:</h5>
                    
                </div>
                <div class="modal-body">
                <div class="row">
                      <label for="">Mã khách hàng:</label>
                      <h5 id="makh"></h5>
                    </div>
                    <div class="row">
                      <label for="">Tên khách hàng:</label>
                      <h5 id="tenkh"></h5>
                    </div>
                    <div class="row">
                      <label for="">Liên hệ:</label>
                      <h5 id="lienhe"></h5>
                    </div>
                    <div class="row">
                      <label for="">Số điện thoại:</label>
                      <h5 id="sdt"></h5>
                    </div>
                    <div class="row">
                      <label for="">Địa chỉ:</label>
                      <h5 id="diachi"></h5>
                    </div>
                    <div class="row">
                      <label for="">Mã số thuế:</label>
                      <h5 id="masothue"></h5>
                    </div>
                    <div class="row">
                      <label for="">Giao hàng 1:</label>
                      <h5 id="giaohang1"></h5>
                    </div>
                    <div class="row">
                      <label for="">SDDT1:</label>
                      <h5 id="sdt1"></h5>
                    </div>
                    <div class="row">
                      <label for="">Khuyến mãi 1:</label>
                      <h5 id="km1"></h5>
                    </div>
                    <div class="row">
                      <label for="">Địa chỉ giao hàng 2:</label>
                      <h5 id="giaohang2"></h5>
                    </div>
                    <div class="row">
                      <label for="">SDT2:</label>
                      <h5 id="sdt2"></h5>
                    </div>
                    <div class="row">
                      <label for="">Khoảng cách 2:</label>
                      <h5 id="km2"></h5>
                    </div>
                    <div class="row">
                      <label for="">Ghi chú:</label>
                      <h5 id="ghichu"></h5>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary" id="save">Save changes</button> -->
                </div>
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
          // {data: 'nguoitao', name: 'nguoitao'},
          {data: 'diachi', name: 'diachi'},
          // {data: 'masothue', name: 'masothue'},
          // {data: 'giaohang1', name: 'giaohang1'},
          // {data: 'sdt1', name: 'sdt1'},
          // {data: 'km1', name: 'km1'},
          // {data: 'giaohang2', name: 'giaohang2'},
          // {data: 'sdt2', name: 'sdt2'},
          // {data: 'km2', name: 'km2'},
          // {data: 'ghichu', name: 'ghichu'},
          {data: 'action', name: 'action'},
        ]
      });
    })
  </script>
@endsection

@push('scripts')

  <script>
    //xu ly cau hinh
    // const cauhinh = document.querySelector('#cauhinhsp');
    // const cauhinhModal = new bootstrap.Modal( document.querySelector('#cauhinhForm'));
    // cauhinh.addEventListener('click', function(e){
    // cauhinhModal.show();//('show')
    // })
    const detailModal = new bootstrap.Modal(document.querySelector('#modal'));

    function xemTT(id) {
    // document.querySelector('#idsp').innerText = id;
    axios.get('/khachhangs/view/' + id)
    .then(response => {

    console.log(response);
    const kh =response.data;
    document.querySelector('#makh').innerText = kh.makh;
    document.querySelector('#tenkh').innerText = kh.tenkh;
    document.querySelector('#lienhe').innerText = kh.lienhe;
    document.querySelector('#sdt').innerText = kh.sdt;
    document.querySelector('#diachi').innerText = kh.diachi;
    document.querySelector('#masothue').innerText = kh.masothue;
    document.querySelector('#giaohang1').innerText = kh.giaohang1;
    document.querySelector('#sdt1').innerText = kh.sdt1;
    document.querySelector('#km1').innerText = kh.km1;
    document.querySelector('#giaohang2').innerText = kh.giaohang2;
    document.querySelector('#sdt2').innerText = kh.sdt2;
    document.querySelector('#km2').innerText = kh.km2;
    document.querySelector('#ghichu').innerText = kh.ghichu;
    detailModal.show(); //('show')

    }
    )
    .catch(error => {
    console.log(error);
    });

  }
    </script>

    <script>
    //xu ly khi nhan nut save
    // document.querySelector('#save').addEventListener('click', () => {
    //   let data = [];
    //   const allCongdoan = document.querySelectorAll('.cd');
    //   allCongdoan.forEach(cdEl => {
    //     if (cdEl.checked) { //neu value co trong mang thi them checked cho no
    //       data.push(cdEl.value)
    //     }
    //     console.log(data);
    //   })
    // });
    </script>
@endpush