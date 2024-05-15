@extends('layouts.app')
 
@section('title', 'Form Công đoạn')
 
@section('contents')
  <form action="{{ isset($congdoan) ? route('congdoan.update', $congdoan->id) : route('congdoan.save') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($category) ? 'Form sửa công đoạn' : 'Form thêm công đoạn' }}</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="nama">Tên Công Đoạn</label>
              <input type="text" class="form-control" id="tencongdoan" name="tencongdoan" value="{{ isset($congdoan) ? $congdoan->tencongdoan : '' }}">
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