@extends('layouts.app')
 
@section('title', 'Dữ liệu về Công đoạn')
 
@section('contents')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Dữ liệu về Công đoạn</h6>
    </div>
    <div class="card-body">
      <a href="{{ route('congdoan.add') }}" class="btn btn-primary mb-3">Thêm công đoạn</a>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Name Category</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @php($no = 1)
            @foreach ($congdoans as $row)
        <tr>
        <th>{{ $no++ }}</th>
        <td>{{ $row->tencongdoan }}</td>
        <td>
        <a href="{{ route('congdoan.edit', $row->id) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('congdoan.delete', $row->id) }}" class="btn btn-danger">Delete</a>
        </td>
        </tr>
      @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection