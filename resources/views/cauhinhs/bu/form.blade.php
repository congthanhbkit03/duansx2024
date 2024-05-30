@extends('layouts.app')
 
@section('title', 'Form Category')
 
@section('contents')
  <form action="{{ route('cauhinhs.save.bu')}}" method="post">  
  @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($cauhinh) ? 'Form Edit Category' : 'Form add Category' }}</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="nama">Key</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ isset($cauhinh) ? $cauhinh->key : '' }}">
            </div>
            <div class="form-group">
              <label for="nama">Value</label>
              <textarea rows="10" class="form-control" id="value" name="value">{{isset($cauhinh) ? $cauhinh->value : '' }}</textarea>
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