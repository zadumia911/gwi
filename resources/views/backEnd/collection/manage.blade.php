@extends('backEnd.layouts.master')
@section('title','Payment Manage')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <div class="page-title">
            <h6>Payment Manage</h6>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="short-icon text-right">
            <a href="{{url('editor/payment/add')}}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
            <th>Customer Name</th>
            <th>Bill No</th>
            <th>Previous Balance</th>
            <th>Cash Paid</th>
            <th>Cheque Amount</th>
            <th>Bank Amount</th>
            <th>Balance</th>
            <th>Payment Method</th>
            <th>Bank Name</th>
            <th>Date</th>
            <th>Activate</th>
            <th>Status</th>
            <th class="action_button">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($show_datas as $key=>$value)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$value->employee->name}}</td>
            <td>{{$value->customer_name}}</td>
            <td>{{$value->customer_address}}</td>
            <td>{{$value->customer_phone}}</td>
            <td>{{$value->customer_email}}</td>
            <td>{{$value->customer_web}}</td>
            <td>{{$value->customer_balance}}</td>
            <td>{{$value->status ==1 ? 'Active' : 'Inactive'}}</td>
            <td class="action_button">
              <ul class="manage-btn-group">
                <li><a href="{{url('editor/payment/edit/'.$value->id)}}" class="btn btn-info"><i class="fa fa-edit"></i></a></li>
                <li>@if($value->status==1)
                  <form action="{{url('editor/payment/inactive')}}" method="POST">
                      @csrf
                      <input type="hidden" name="hidden_id" value="{{$value->id}}">
                      <button type="submit" class="btn btn-secondary" title="Inactive" onclick="return confirm('Are you want change this?')"><i class="fa fa-thumbs-down"></i></button>
                  </form>
                @else
                <form action="{{url('editor/payment/active')}}" method="POST">
                  @csrf
                  <input type="hidden" name="hidden_id" value="{{$value->id}}">
                  <button type="submit" class="btn btn-success"  onclick="return confirm('Are you want change this?')" title="Active"><i class="fa fa-thumbs-up"></i></button> 
                </form></li>
                @endif
                 <li>
                  <form action="{{url('editor/payment/delete')}}" method="POST">
                    @csrf
                    <input type="hidden" name="hidden_id" value="{{$value->id}}">
                    <button type="submit" onclick="return confirm('Are you delete this user?')" class="btn btn-danger"><i class="fa fa-times"></i></button>
                  </form>
                </li>
              </ul>
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