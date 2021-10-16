@extends('backEnd.layouts.master')
@section('title','Supplier Report')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <div class="page-title">
            <h6>Supplier Report</h6>
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
          <form method="get" class="form-row">
              <div class="col-sm-3">
                  <div class="form-group">
                      <input type="date" class="form-control" name="start_date" placeholder="Start Date" value="{{$start_date}}">
                  </div>
              </div>
              <div class="col-sm-3">
                  <div class="form-group">
                      <input type="date" class="form-control" name="end_date" placeholder="End Date" value="{{$end_date}}">
                  </div>
              </div>
              <div class="col-sm-3">
                  <div class="form-group">
                     <button class="btn btn-success"> <i class="fa fa-search"></i> </button>
                  </div>
              </div>
          </form>
      </div>
  </div>
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
          @php
            $total_paid = 0;
          @endphp
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
          @php
            $total_paid += $value->paid;
          @endphp
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{$total_paid}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

@endsection