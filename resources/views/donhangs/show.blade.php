@extends('layouts.app')

@section('title', 'Thông tin Đơn Hàng')

@push('styles')
    <style>
        .hide {
            display: none;
        }
    </style>
@endpush

@section('contents')
    <!-- <form action="{{ isset($donhang) ? route('donhangs.update', $donhang->id) : route('donhangs.save') }}" method="post">
        @csrf -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Thông tin đơn hàng</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            Tên khách hàng:<strong> {{ $donhang->khachhang->tenkh }} </strong>
                        </div>
                        <div class="col">
                            Ngày giao hàng:<strong> {{ $donhang->ngaygiaohang }} </strong>
                        </div>
                        <div class="col">
                            Trạng thái đơn hàng:<strong> {{ $donhang->trangthai }} </strong>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-10">
                            <h6 class="m-0 font-weight-bold text-primary">Các sản phẩm trong đơn hàng</h6>
                        </div>
                        <div class="col-2"> <button class="btn btn-success" id="themsp">Thêm sản phẩm</button></div>
                    </div>

                </div>
                <div class="card-body">
                    <!-- <form id="formsanpham" class="hide" action="{{ isset($donhang) ? route('donhangs.update', $donhang->id) : route('donhangs.save') }}" method="post"> -->
                    <form id="formsanpham" class="hide" action="{{ route('donhangs.show.themsp', $donhang->id) }}"
                        method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">
                                            {{ isset($product) ? 'Form Edit product' : 'Form plus product' }}</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col">
                                                <label for="productname">Tên sản phẩm</label>
                                                <input type="text" class="form-control" id="productname" name="tensp"
                                                    value="{{ isset($product) ? $product->tensp : '' }}">
                                            </div>
                                            <div class="col">
                                                <label for="productname">Số lượng</label>
                                                <input type="text" class="form-control" id="productname" name="soluong"
                                                    value="{{ isset($product) ? $product->soluong : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="productname">Giá</label>
                                                <input type="text" class="form-control" id="productname" name="gia"
                                                    value="{{ isset($product) ? $product->gia : '' }}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="price">Kiểu sản phẩm</label>
                                                <select name="kieusp">
                                                    <option>Hộp</option>
                                                    <option>Miếng</option>
                                                </select>
                                            </div>

                                            <div class="col">
                                                <label for="price">Dài</label>
                                                <input type="text" class="form-control" id="dai" name="dai"
                                                    value="{{ isset($product) ? $product->dai : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Rộng</label>
                                                <input type="text" class="form-control" id="rong" name="rong"
                                                    value="{{ isset($product) ? $product->rong : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Cao</label>
                                                <input type="text" class="form-control" id="cao" name="cao"
                                                    value="{{ isset($product) ? $product->cao : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Sóng</label>
                                                <select class="form-control" id="song" name="song">
                                                    <option>A</option>
                                                    <option>B</option>
                                                    <option>C</option>
                                                    <option>D</option>
                                                    <option>AB</option>
                                                    <option>AC</option>
                                                    <option>AD</option>
                                                    <option>BC</option>
                                                    <option>BD</option>
                                                    <option>CD</option>
                                                    <option>ABC</option>
                                                    <option>ABD</option>
                                                    <option>ACD</option>
                                                    <option>BCD</option>
                                                </select>
                                            </div>

                                            <div class="col">
                                                <label for="price">Dài phôi</label>
                                                <input type="number" class="form-control" id="daiphoi" name="daiphoi"
                                                    value="{{ isset($product) ? $product->daiphoi : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Rộng phôi</label>
                                                <input type="number" class="form-control" id="rongphoi" name="rongphoi"
                                                    value="{{ isset($product) ? $product->rongphoi : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Kiểu in</label>
                                                <select class="form-control" id="kieuin" name="kieuin">
                                                    <option>Flexo</option>
                                                    <option>Offset</option>
                                                </select>
                                            </div>

                                            <div class="col">
                                                <label for="price">Số màu</label>
                                                <input type="number" class="form-control" id="productname"
                                                    name="somau"
                                                    value="{{ isset($product) ? $product->productname : '' }}">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label for="price">Nắp 1</label>
                                                <input type="number" class="form-control" id="productname"
                                                    name="nap1"
                                                    value="{{ isset($product) ? $product->productname : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Cao nắp 1</label>
                                                <input type="number" class="form-control" id="productname"
                                                    name="caonap1"
                                                    value="{{ isset($product) ? $product->productname : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Nắp 2</label>
                                                <input type="number" class="form-control" id="productname"
                                                    name="nap2"
                                                    value="{{ isset($product) ? $product->productname : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Cao nắp 2</label>
                                                <input type="number" class="form-control" id="productname"
                                                    name="caonap2"
                                                    value="{{ isset($product) ? $product->productname : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Nắp 3</label>
                                                <input type="number" class="form-control" id="productname"
                                                    name="nap3"
                                                    value="{{ isset($product) ? $product->productname : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Nắp 4</label>
                                                <input type="number" class="form-control" id="productname"
                                                    name="nap4"
                                                    value="{{ isset($product) ? $product->productname : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Lằng</label>
                                                <input type="number" class="form-control" id="productname"
                                                    name="lang"
                                                    value="{{ isset($product) ? $product->productname : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Bát</label>
                                                <input type="number" class="form-control" id="productname"
                                                    name="bat"
                                                    value="{{ isset($product) ? $product->productname : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Lề biên</label>
                                                <input type="number" class="form-control" id="productname"
                                                    name="lebien"
                                                    value="{{ isset($product) ? $product->productname : '' }}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
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
                                            <div class="col">
                                                <label for="price">Trọng lượng</label>
                                                <input type="number" class="form-control" id="productname"
                                                    name="trongluong"
                                                    value="{{ isset($product) ? $product->productname : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Diện tích</label>
                                                <input type="number" class="form-control" id="productname"
                                                    name="dientich"
                                                    value="{{ isset($product) ? $product->productname : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Đổ bục</label>
                                                <input type="number" class="form-control" id="productname"
                                                    name="dobuc"
                                                    value="{{ isset($product) ? $product->productname : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Nén ECT</label>
                                                <input type="number" class="form-control" id="productname"
                                                    name="nenect"
                                                    value="{{ isset($product) ? $product->productname : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Nén FCT</label>
                                                <input type="number" class="form-control" id="productname"
                                                    name="nenfct"
                                                    value="{{ isset($product) ? $product->productname : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Mặt 3</label>
                                                <input type="number" class="form-control" id="productname"
                                                    name="mat3"
                                                    value="{{ isset($product) ? $product->productname : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Sóng 3</label>
                                                <input type="number" class="form-control" id="productname"
                                                    name="song3"
                                                    value="{{ isset($product) ? $product->productname : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Mặt 2</label>
                                                <input type="number" class="form-control" id="productname"
                                                    name="mat2"
                                                    value="{{ isset($product) ? $product->productname : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Sóng 2</label>
                                                <input type="number" class="form-control" id="productname"
                                                    name="song2"
                                                    value="{{ isset($product) ? $product->productname : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Mặt 1</label>
                                                <input type="number" class="form-control" id="productname"
                                                    name="mat1"
                                                    value="{{ isset($product) ? $product->productname : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Sóng 1</label>
                                                <input type="number" class="form-control" id="productname"
                                                    name="song1"
                                                    value="{{ isset($product) ? $product->productname : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Mặt in</label>
                                                <input type="number" class="form-control" id="productname"
                                                    name="matin"
                                                    value="{{ isset($product) ? $product->productname : '' }}">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label for="price">Chống thấm</label>
                                                <select name="chongtham" id="">
                                                    <option>Có</option>
                                                    <option>Không</option>
                                                </select>
                                                <!-- <input type="number" class="form-control" id="productname" name="chongtham" value="{{ isset($product) ? $product->productname : '' }}"> -->
                                            </div>

                                            <div class="col">
                                                <label for="price">Cán màng</label>
                                                <input type="number" class="form-control" id="productname"
                                                    name="canmang"
                                                    value="{{ isset($product) ? $product->productname : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Bồi</label>
                                                <input type="number" class="form-control" id="productname"
                                                    name="boi"
                                                    value="{{ isset($product) ? $product->productname : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Chạp</label>
                                                <input type="number" class="form-control" id="productname"
                                                    name="chap"
                                                    value="{{ isset($product) ? $product->productname : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Bế</label>
                                                <input type="number" class="form-control" id="productname"
                                                    name="be"
                                                    value="{{ isset($product) ? $product->productname : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Dán</label>
                                                <input type="number" class="form-control" id="productname"
                                                    name="dan"
                                                    value="{{ isset($product) ? $product->productname : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Ghim</label>
                                                <input type="number" class="form-control" id="productname"
                                                    name="ghim"
                                                    value="{{ isset($product) ? $product->productname : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Bó cột</label>
                                                <input type="number" class="form-control" id="productname"
                                                    name="bocot"
                                                    value="{{ isset($product) ? $product->productname : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Quấn màng</label>
                                                <input type="number" class="form-control" id="productname"
                                                    name="quanmang"
                                                    value="{{ isset($product) ? $product->productname : '' }}">
                                            </div>

                                            <div class="col">
                                                <label for="price">Ghi chú</label>
                                                <textarea name="ghichu" class="form-control">

                          </textarea>
                                            </div>
                                        </div>
                                    </div> <!--  end card body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <button type="button" class="btn btn-warning" id="cancel">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Ma SP</th>
                                    <th>Tên SP</th>
                                    <th>Kết cấu</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    <th>Thành tiền</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($no = 1)
                                @foreach ($sanphams as $row)
                                    <tr>
                                        <th>{{ $no++ }}</th>
                                        <th>{{ $row->id }}</th>
                                        <td>{{ $row->tensp }}</td>
                                        <td>{{ $row->ketcau }}</td>
                                        <td>{{ $row->soluong }}</td>
                                        <td>{{ $row->gia }}</td>
                                        <td>{{ $row->soluong * $row->gia }}</td>
                                        <td>
                                            <button class="btn btn-success" id="cauhinhsp"
                                                onclick="cauhinhSX({{ $row->id }})">Cấu hình</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Thiết lập quy trình cho sản phẩm có ID: <span
                            id="idsp"></span></h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @foreach ($congdoans as $cd)
                        <div class="row">
                            <div class="col-md-2"><input type="checkbox" value="{{ $cd->id }}" class="cd"
                                    id="{{ $cd->id }}" /></div>
                            <div class="col-md-10"> <label for="{{ $cd->id }}">{{ $cd->tencongdoan }}</label>
                            </div>
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
        //xu ly onchange tren input
        const daiInp = document.querySelector('#dai');
        const rongInp = document.querySelector('#rong');
        const daiphoi = document.querySelector('#daiphoi')
        rongInp.addEventListener('input', function(e) {
            if (rongInp.value.length > 0 && !isNaN(daiInp.value) && !isNaN(rongInp.value)) {
                //2 truong co du lieu la so thi moi tinh
                daiphoi.value = (parseInt(daiInp.value) + parseInt(rongInp.value)) * 2 + 35;
            }
        })

        const songSelect =document.querySelector('#song')
        const rongphoig = document.querySelector('#rongphoi')
        songSelect.addEventListener('change', function(e){
            console.log(this.value);
            axios.get('{{route('getcauhinh', 'bu')}}')
            .then(response => {
                //lay cau hinh bu tu db cau hinh
                // console.log(response.data);
                let buconf = JSON.parse(response.data.value);
                let bu = 0;
                console.log(buconf);
                if (this.value.length == 1){
                    bu =buconf.song1;
                } else if (this.value.length == 2){
                    bu =buconf.song2;
                } else {
                    bu =buconf.song3;
                }
                console.log(bu);

                //rongphoi = Rong + Cao + Bu
                rongphoig.value = parseInt(rong.value) + parseInt(cao.value) + parseInt(bu);
            })
            .catch(err => {
                alert("Khong truy cap duoc thong tin cau hinh bu song")
            })
        })
    </script>
    <script>
        const themspbt = document.querySelector('#themsp');
        const cancelbt = document.querySelector('#cancel');
        const formsp = document.querySelector('#formsanpham');
        themspbt.addEventListener('click', function(e) {
            console.log("EEEEEEEEEE");
            formsp.classList.remove('hide');
        })

        cancelbt.addEventListener('click', function() {
            formsp.classList.add('hide');
        })
    </script>

    <script>
        //xu ly cau hinh
        // const cauhinh = document.querySelector('#cauhinhsp');
        // const cauhinhModal = new bootstrap.Modal( document.querySelector('#cauhinhForm'));
        // cauhinh.addEventListener('click', function(e){
        // cauhinhModal.show();//('show')
        // })
        function cauhinhSX(id) {
            const cauhinhModal = new bootstrap.Modal(document.querySelector('#cauhinhForm'));
            document.querySelector('#idsp').innerText = id;
            axios.get('/sanphams/' + id + '/congdoan')
                .then(data => {
                    const cds = data.data.congdoan;
                    //cac cong doan cua san pham duoc chon
                    const cdArr = cds.split(',');
                    console.log(cdArr);
                    //lay tat ca cac input condoan - so sanh' value neu thuoc mang nay thi them thuoc tinh check
                    const allCongdoan = document.querySelectorAll('.cd');
                    allCongdoan.forEach(cdEl => {
                        if (cdArr.includes(cdEl.value)) { //neu value co trong mang thi them checked cho no
                            console.log("CHUUUUUUUUUUUa");
                            // cdEl.setAttribute("checked", true);
                            cdEl.checked = true;
                        } else {
                            cdEl.checked = false;
                        }
                    });
                    cauhinhModal.show(); //('show')

                })
        }
    </script>

    <script>
        //xu ly khi nhan nut save
        document.querySelector('#save').addEventListener('click', () => {
            let data = [];
            const allCongdoan = document.querySelectorAll('.cd');
            allCongdoan.forEach(cdEl => {
                if (cdEl.checked) { //neu value co trong mang thi them checked cho no
                    data.push(cdEl.value)
                }
                console.log(data);
            })
        });
    </script>
@endpush
