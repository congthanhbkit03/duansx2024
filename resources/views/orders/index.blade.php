@extends('layouts.app')
 
@section('title', 'Data Orders')
 
@section('contents')
  <div class="card shadow mb-4">
    <div class="card-header py-3">
    <div class="row">
      <h6 class="m-0 font-weight-bold text-primary col-md-9">Data Orders</h6>
      <div class="col-md-3">
          <div id="daterange"  class="float-end" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%; text-align:center">
              <i class="fa fa-calendar"></i>&nbsp;
              <span></span> 
              <i class="fa fa-caret-down"></i>
          </div>
      </div>
      </div>
    </div>
    <div class="card-body">
      <!-- <a href="{{ route('users.add') }}" class="btn btn-primary mb-3">Add new user</a> -->
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Order Number</th>
              <th>Status</th>
              <th>Grand Total</th>
              <th>Item Count</th>                            
              <th>is Paid?</th>                            
              <th>Payment Method</th>                            
              <th>Notes</th>                            
              <th>Created at</th>                            
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
      var start_date = moment().subtract(1, 'M');
      var end_date = moment();
      $('#daterange span').html(start_date.format('MMMM D, YYYY') + ' - ' + end_date.format('MMMM D, YYYY'))
      $('#daterange').daterangepicker({
        startDate: start_date,
        endDate: end_date
      }, function(s, e) {
        //cap nhat vao span gia tri chon
        $('#daterange span').html(s.format('MMMM D, YYYY') + ' - ' + e.format('MMMM D, YYYY'))
        //load lai calendar
        table.draw();   //???
      })
      
      
        var table = $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "{{ route('orders')}}",
          data: function(data) {
            data.start_date = $('#daterange').data('daterangepicker').startDate.format('YYYY-MM-DD');
            data.end_date = $('#daterange').data('daterangepicker').endDate.format('YYYY-MM-DD');
          }
        },
        columns: [
          {data: 'DT_RowIndex', name: 'DT_RowIndex'},
          {data: 'order_number', name: 'order_number'},
          {data: 'status', name: 'status'},
          {data: 'grand_total', name: 'grand_total'},
          {data: 'item_count', name: 'item_count'},
          {data: 'is_paid', name: 'is_paid'},
          {data: 'payment_method', name: 'payment_method'},
          {data: 'notes', name: 'notes'},
          {data: 'created_at', name: 'created_at'},
          {data: 'action', name: 'action'},
        ]
      });
    })
  </script>
@endsection