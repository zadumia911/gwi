@extends('backEnd.layouts.master')
@section('title','Stock Ledger')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <div class="page-title">
            <h6>Stock Ledger</h6>
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
          <form method="get" class="form-row justify-content-center">
              <div class="col-sm-4">
                  <div class="form-group">
                    <select name="bank_id" class="form-control">
                      <option value=" ">Select Bank</option>
                      @foreach($banks as $value)
                      <option value="{{$value->id}}">{{$value->bank_name}}</option>
                      @endforeach
                    </select>
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
      <table id="example1" class="table table-bordered table-responsive-sm">
        <thead>
          <tr>
            <th>SL</th>
            <th>Date</th>
            <th>Description</th>
            <th>Bank Name</th>
            <th>Cheque</th>
            <th>Credit</th>
            <th>Debit</th>
          </tr>
        </thead>
        <tbody>
          @foreach($show_datas as $key=>$value)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$value->created_at->format('Y-m-d')}}</td>
            <td>{{$value->comment}}</td>
            <td>{{$value->bank->bank_name}}</td>
            <td>{{$value->cheque_number}}</td>
            <td>{{$value->type=="deposit"? $value->amount: ''}}</td>
            <td>{{$value->type=="withdraw"? $value->amount: ''}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

@endsection