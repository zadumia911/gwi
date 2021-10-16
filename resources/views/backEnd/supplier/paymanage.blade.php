@extends('backEnd.layouts.master')
@section('title','Supplier Payment')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <div class="page-title">
            <h6>Supplier Payment</h6>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="short-icon text-right">
            <a href="{{url('admin/supplier/payment/add')}}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
            <th>Supplier Name</th>
            <th>Bill No</th>
            <th>Previous Due</th>
            <th>Cash Paid</th>
            <th>Cheque Amount</th>
            <th>Bank Amount</th>
            <th>Balance</th>
            <th>Method</th>
            <th>Bank Name</th>
            <th>Date</th>
            <th>Activation</th>
            <th class="action_button">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($show_datas as $key=>$value)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$value->supplier->supplier_name}}</td>
            <td>{{$value->id}}</td>
            <td>{{$value->previous_balance}}</td>
            <td>{{$value->paid}}</td>
            <td>{{$value->check_amount}}</td>
            <td>{{$value->bank_amount}}</td>
            <td>{{$value->balance}}</td>
            <td>{{$value->payment_method}}</td>
            <td>{{$value->bank?$value->bank->bank_name:''}}</td>
            <td>{{$value->date}}</td>
            <td> @if($value->status==1)
                <button type="submit" class="btn btn-info">Actived</i></button>
                @else
                <form action="{{url('admin/supplier/payment/active')}}" method="POST">
                  @csrf
                  <input type="hidden" name="hidden_id" value="{{$value->id}}">
                  <button type="submit" class="btn btn-success"  onclick="return confirm('Are you want change this?')" title="Active"><i class="fa fa-thumbs-up"></i></button> 
                </form>
                @endif</td>
            <td class="action_button">
                 <li>
                  <form action="{{url('admin/supplier/payment/delete')}}" method="POST">
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