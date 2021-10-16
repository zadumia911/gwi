@extends('backEnd.layouts.master')
<<<<<<< HEAD
@section('title','Sale Manage')
=======
@section('title','Purchase Manage')
>>>>>>> 9e8535525d5c814aa12ad88f1279851724bf9c31
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <div class="page-title">
<<<<<<< HEAD
            <h6>Sale Manage</h6>
=======
            <h6>Purchase Manage</h6>
>>>>>>> 9e8535525d5c814aa12ad88f1279851724bf9c31
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
<<<<<<< HEAD
      <table id="example1" class="table table-bordered table-responsive-sm">
=======
      <table id="example1" class="table table-bordered table-responsive">
>>>>>>> 9e8535525d5c814aa12ad88f1279851724bf9c31
        <thead>
          <tr>
            <th>SL</th>
            <th>Date</th>
<<<<<<< HEAD
            <th>Bill No</th>
=======
            <th>Bill Number</th>
>>>>>>> 9e8535525d5c814aa12ad88f1279851724bf9c31
            <th>Customer Name</th>
            <th>Total Amount</th>
            <th>Discount</th>
            <th>Paid</th>
            <th>Due Amount</th>
<<<<<<< HEAD
=======
            <th>Payment Method</th>
            <th>Status</th>
>>>>>>> 9e8535525d5c814aa12ad88f1279851724bf9c31
            <th class="action_button">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($show_datas as $key=>$value)
          <tr>
            <td>{{$loop->iteration}}</td>
<<<<<<< HEAD
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
=======
            <td>{{$value->barcode}}</td>
            <td>{{$value->pro_name}}</td>
            <td>{{$value->category->category_name}}</td>
            <td>{{$value->brand->brand_name}}</td>
            <td>{{$value->pack_size}}</td>
            <td>{{$value->status ==1 ? 'Active' : 'Inactive'}}</td>
            <td class="action_button">
              <ul class="manage-btn-group">
                <li><a href="{{url('editor/purchase/edit/'.$value->id)}}" class="btn btn-info"><i class="fa fa-edit"></i></a></li>
                <li>@if($value->status==1)
                  <form action="{{url('editor/purchase/inactive')}}" method="POST">
                      @csrf
                      <input type="hidden" name="hidden_id" value="{{$value->id}}">
                      <button type="submit" class="btn btn-secondary" title="Inactive" onclick="return confirm('Are you want change this?')"><i class="fa fa-thumbs-down"></i></button>
                  </form>
                @else
                <form action="{{url('editor/purchase/active')}}" method="POST">
                  @csrf
                  <input type="hidden" name="hidden_id" value="{{$value->id}}">
                  <button type="submit" class="btn btn-success"  onclick="return confirm('Are you want change this?')" title="Active"><i class="fa fa-thumbs-up"></i></button> 
                </form></li>
                @endif
                 <li>
                  <form action="{{url('editor/purchase/delete')}}" method="POST">
                    @csrf
                    <input type="hidden" name="hidden_id" value="{{$value->id}}">
                    <button type="submit" onclick="return confirm('Are you delete this user?')" class="btn btn-danger"><i class="fa fa-times"></i></button>
                  </form>
                </li>
              </ul>
>>>>>>> 9e8535525d5c814aa12ad88f1279851724bf9c31
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