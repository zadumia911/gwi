@extends('backEnd.layouts.master')
@section('title','Purchase Manage')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <div class="page-title">
            <h6>Purchase Manage</h6>
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
      <table id="example1" class="table table-bordered table-responsive">
        <thead>
          <tr>
            <th>SL</th>
            <th>Date</th>
            <th>Invoice Number</th>
            <th>Supplier Name</th>
            <th>Total Amount</th>
            <th>Vat</th>
            <th>Transport</th>
            <th>Discount</th>
            <th>Paid</th>
            <th>Due Amount</th>
            <th>Payment Method</th>
            <th class="action_button">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($show_datas as $key=>$value)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$value->purchase_date}}</td>
            <td>{{$value->id}}</td>
            <td>{{$value->supplier_id}}</td>
            <td>{{$value->total_amount}}</td>
            <td>{{$value->vat}}</td>
            <td>{{$value->discount}}</td>
            <td>{{$value->transport}}</td>
            <td>{{$value->cash_paid}}</td>
            <td>{{$value->due}}</td>
            <td>{{$value->payment_method}}</td>
            <td class="action_button">
              <form action="{{url('editor/purchase/delete')}}" method="POST">
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