@extends('layouts.app')
 
@section('title', 'Form Thêm Đơn Hàng')

@push('styles')
  <style>
  #dskh{
    position: relative;
  background: green;
  /* width: 46%; */
  list-style: none;
  }

  #dskh li{
    display: flex;
    justify-content: space-between;
    padding: 10px;
  }

  #khachhang{
    display: flex;
  }
  .khachhangcu{
    background-color: orange;
    flex: 1;
    padding: 10px;
  }
  .khachhangmoi{
    background-color: blue;
    flex: 1;
    color: white;
    font-size: 25px;
    justify-content: center;
    display: flex;
    align-items: center;
  }
  .khachhangmoi:hover{
    cursor: pointer;
  }
  </style>

  @push('styles')
  <style>
  .hide{
  display: none;
  }
  </style>
@endpush
@endpush
@section('contents')
<form action="{{ isset($donhang) ? route('donhangs.update', $donhang->id) : route('donhangs.save') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($donhang) ? 'Chỉnh sửa đơn hàng' : 'Thêm mới đơn hàng' }}</h6>
          </div>
          <div class="card-body">
            <!-- <div class="form-group">
              <label for="item_code">Mã Đơn hàng</label>
              <input type="text" class="form-control" id="madonhang" name="madonhang" value="{{ isset($donhang) ? $donhang->madonhang : '' }}">
            </div> -->
            <div class="row">
              <div class="col-8">
                <div>Mã KH:
                  <input type="text"  id="khachhang_id" name="khachhang_id" value="{{ isset($donhang) ? $donhang->khachhang_id : '' }}">
                </div>
                <ul style="color: blue; font-style: italic; background: #cecece; margin-top: 20px;">
                  <li>Nếu khách hàng đã tồn tại - nhập từ khóa cần tìm và chọn khách hàng - hoặc nhập trực tiếp mã Khách hàng vào.</li><li>Nếu khách hàng là mới: - Nhấn nút "Thêm mới Khách hàng", điền các thông tin khách hàng mới và lưu.</li>
                </ul>
                <div id="khachhang">
                    
                  <div class="khachhangcu">
                    Nhập và tìm khách hàng:
                    <input type="text" id="tukhoa">
                    <ul id="dskh">
                    </ul>
                    <br>
                    
                    <!-- <p class="chitietkh"></p> -->
                  </div>
                  <div class="khachhangmoi" id="themmoikh">
                    Thêm mới KH
                  </div>
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  <label for="donhangname">Ngày giao hàng</label>
                  <input type="date" class="form-control" id="ngaygiaohang" name="ngaygiaohang" value="{{ isset($donhang) ? $donhang->ngaygiaohang : '' }}">
                </div>
              </div>
              <div class="col"></div>
            </div>
            <!-- <div class="form-group">
              <label for="donhangname">Số lượng</label>
              <input type="text" class="form-control" id="soluong" name="soluong" value="{{ isset($donhang) ? $donhang->soluong : '' }}">
            </div> -->
           
            <!-- <div class="form-group">
              <label for="price">Loại đơn hàng</label>
              <select id="loaidonhang" name="loaidonhang">
                <option>Đầy đủ</option>
                <option>Không đầy đủ</option>
              </select>
            </div> -->

            

            <div class="form-group">
              
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </div>
      </div>
    </div>
  </form>

  <!-- Modal -->
<div class="modal fade" id="themkhachang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<form action="{{ route('donhangs.themkhachhang.save') }}" method="post">
    @csrf  
<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thêm khách hàng mới: <span id="idsp"></span></h5>
       
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     
        <div class="row">
          <div class="col">
              <div class="form-group">
              <label for="item_code">Mã Khách hàng</label>
              <input type="text" class="form-control" id="makh" name="makh">
            </div>

            <div class="form-group">
              <label for="khachhangname">Tên Khách hàng</label>
              <input type="text" class="form-control" id="tenkh" name="tenkh" >
            </div>
              </div>
              <div class="col">
              <div class="form-group">
              <label for="price">Liên hệ</label>
              <input type="text" class="form-control" id="lienhe" name="lienhe" >
            </div>

            <div class="form-group">
              <label for="price">Số điện thoại</label>
              <input type="text" class="form-control" id="sdt" name="sdt" >
            </div>
              </div>
              <div class="col">
              <div class="form-group">
              <label for="price">Địa chỉ</label>
              <input type="text" class="form-control" id="diachi" name="diachi" >
            </div>

            <div class="form-group">
              <label for="price">Mã số thuế</label>
              <input type="text" class="form-control" id="masothue" name="masothue" >
            </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                <label for="price">Giao hàng 1</label>
                <input type="text" class="form-control" id="giaohang1" name="giaohang1">
              </div>
              </div>
              <div class="col">
              <div class="form-group">
              <label for="price">Số điện thoại 1</label>
              <input type="text" class="form-control" id="sdt1" name="sdt1" >
            </div>
              </div>
           <div class="col">
           <div class="form-group">
              <label for="price">Số km 1</label>
              <input type="text" class="form-control" id="km1" name="km1" >
            </div>
           </div>

            </div>
            <div class="row">
              <div class="col">
              <div class="form-group">
              <label for="price">Giao hàng 2</label>
              <input type="text" class="form-control" id="giaohang2" name="giaohang2"">
            </div>
              </div>
              <div class="col"><div class="form-group">
              <label for="price">Số điện thoại 2</label>
              <input type="text" class="form-control" id="sdt2" name="sdt2"">
            </div></div>
              <div class="col">
              <div class="form-group">
              <label for="price">Số km 2</label>
              <input type="text" class="form-control" id="km2" name="km2"">
            </div>
              </div>
            </div>           
            
            <div class="form-group">
              <label for="price">Ghi chú</label>
              <textarea name="ghichu" id="ghichu" class="form-control"></textarea>
            </div>
          </div>
        
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save">Save changes</button>
      </div>
    </div>
    </form>
  </div>
</div>
@endsection

@push('scripts')
  <script>
    const inpSearch = document.querySelector('#tukhoa')
    const ulkh = document.querySelector('#dskh')
    tukhoa.addEventListener('input', function(e){
    let searchkey = e.target.value;
    console.log(searchkey.length);
    // console.log(e.target.value);
    if(searchkey.length >= 3){
    //tim kiem 
    axios.get('/khachhangs/search/' + searchkey)
    .then(data =>{
    ulkh.innerHTML = "";
    console.log(data)
    const khs = data.data;
    khs.forEach(kh => {
    const li = document.createElement('li');
    li.innerHTML = `
    ${kh.makh} - ${kh.tenkh} - ${kh.masothue} - ${kh.diachi}
    <button type="button" onclick="chonkh(${kh.id})">Chọn</button>
    `
    ulkh.append(li);
    })
    } )
    } else {
    ulkh.innerHTML = "";
    }
    });
  </script>

  <script>
    function chonkh(ma){
    const makh =document.querySelector('#khachhang_id');
    const chitietkh =document.querySelector('.chitietkh');
    makh.value = ma;
    // chọn xong reset lại
    document.querySelector('#tukhoa').value = "";
    ulkh.innerHTML = "";
    }

  </script>

  <script>
    //mo form them moi
    const themspbt = document.querySelector('#themmoikh');
    // const cancelbt = document.querySelector('#cancel');
    const modal = new bootstrap.Modal(document.querySelector('#themkhachang'));

    // const formsp = document.querySelector('#formsanpham');
    themspbt.addEventListener('click', function(e){
    console.log("EEEEEEEEEE");

    // formsp.classList.remove('hide');
    modal.show();
    })

    const saveBt = document.querySelector('#save')
    saveBt.addEventListener('click', function() {
    axios.post('{{route('donhangs.themkhachhang.save')}}', {
    makh:document.querySelector('#makh').value,
    tenkh:document.querySelector('#tenkh').value,
    lienhe:document.querySelector('#lienhe').value,
    sdt:document.querySelector('#sdt').value,
    diachi:document.querySelector('#diachi').value,
    masothue:document.querySelector('#masothue').value,
    giaohang1:document.querySelector('#giaohang1').value,
    sdt1:document.querySelector('#sdt1').value,
    km1:document.querySelector('#km1').value,
    giaohang2:document.querySelector('#giaohang2').value,
    sdt2:document.querySelector('#sdt2').value,
    km2:document.querySelector('#km2').value,
    ghichu:document.querySelector('#ghichu').value,
    nguoitao: '',
    mang: '???'
    }).then(data => {console.log(data);
    //set khachhang_id voi ma kh vua tao
    document.querySelector('#khachhang_id').value = data.data.id
    //xoa du lieu trong form
  document.querySelector('#makh').value = ""
  document.querySelector('#tenkh').value = ""
  document.querySelector('#lienhe').value = ""
  document.querySelector('#sdt').value = ""
  document.querySelector('#diachi').value = ""
    document.querySelector('#masothue').value = ""
    document.querySelector('#giaohang1').value = ""
  document.querySelector('#sdt1').value = ""
    document.querySelector('#km1').value = ""
  document.querySelector('#giaohang2').value = ""
    document.querySelector('#sdt2').value = ""
    document.querySelector('#km2').value = ""
  document.querySelector('#ghichu').value = ""

  modal.hide();
    })
    .catch(error => console.log(error))
    })
    // cancelbt.addEventListener('click', function(){
    // formsp.classList.add('hide');
    // })
  </script>
@endpush

