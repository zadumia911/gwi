@extends('backEnd.layouts.master')
@section('title','Sale Manage')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <div class="page-title">
            <h6>Sale Manage</h6>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="short-icon text-right">
            <a href="{{url('editor/purchase/add')}}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>

  <div class="card">
    <div class="card-body">
      <table id="example1" class="table table-bordered table-responsive-sm">
        <thead>
          <tr>
            <th>SL</th>
            <th>Date</th>
            <th>Bill No</th>
            <th>Customer Name</th>
            <th>Total Amount</th>
            <th>Discount</th>
            <th>Paid</th>
            <th>Due Amount</th>
            <th class="action_button">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($show_datas as $key=>$value)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$value->date}}</td>
            <td>{{$value->bill}}</td>
            <td>{{$value->customer->customer_name}}</td>
            <td>{{$value->total_amount}}</td>
            <td>{{$value->discount}}</td>
            <td>{{$value->cash_paid}}</td>
            <td>{{$value->due}}</td>
            <td class="action_button">
              <form action="{{url('editor/sale/delete')}}" method="POST">
                @csrf
                <input type="hidden" name="hidden_id" value="{{$value->id}}">
                <button type="submit" onclick="return confirm('Are you delete this user?')" class="btn btn-danger"><i class="fa fa-times"></i></button>
              </form>
          </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

@endsection