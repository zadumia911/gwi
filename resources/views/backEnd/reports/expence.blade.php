@extends('backEnd.layouts.master')
@section('title','Expense Report')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <div class="page-title">
            <h6>Expense Report</h6>
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
                    <select name="expence_head" class="form-control" id="">
                      <option value="">Select..</option>
                    @foreach($expencehead as $value)
                      <option value="{{$value->id}}" @if($expence_head==$value->id) selected @endif> {{$value->expense_head}}</option>
                      @endforeach
                      </select>
                  </div>
              </div>
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
      <table id="example1" class="table table-bordered table-responsive-sm">
        <thead>
          <tr>
            <th>SL</th>
            <th>Account Head</th>
            <th>Comment</th>
            <th>Account Type</th>
            <th>Amount</th>
            <th>Create Date</th>
          </tr>
        </thead>
        <tbody>
          @php
            $total = 0;
          @endphp
          @foreach($show_datas as $key=>$value)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$value->expensehead->expense_head}}</td>
            <td>{{$value->comment}}</td>
            <td>{{$value->expense_type_id == 1 ? 'Expenses' : 'Not Valid'}}</td>
            <td>{{$value->expense_amount}}</td>            
            <td>{{$value->date}}</td>
          </tr>
          @php
            $total =+ $value->expense_amount; 
          @endphp
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td colspan="4">Total</td>
            <td colspan="2">{{$total}}</td>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

@endsection