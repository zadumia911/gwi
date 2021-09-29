@extends('backEnd.layouts.master')
@section('title','Employee Salary Reports')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <div class="page-title">
            <h6>Employee Salary Reports</h6>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="short-icon text-right">
            <a href="{{url('admin/employee-salary/add')}}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>

  <div class="card">
    <div class="card-header py-4">
        <form action="" class="form-row" name="editForm">
          <div class="col-sm-3">
            <div class="form-group my-0">
                <select class="form-control select2{{ $errors->has('employee_id') ? ' is-invalid' : '' }}" name="employee_id" value="{{old('employee_id')}}" required>
                  <option>Select Employee</option>
                  @foreach($employees as $key=>$value)
                  <option value="{{$value->id}}">{{$value->name}} {{$value->address}} {{$value->phone}}</option>
                  @endforeach
                </select>
                 @if ($errors->has('employee_id'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('employee_id') }}</strong>
                </span>
                @endif
              </div>
          </div>
          <div class="col-sm-3">
              <div class="form-group my-0">
                  <input type="text" class="myDate form-control {{ $errors->has('start_date') ? ' is-invalid' : '' }}" id="start_date" name="start_date" placeholder="From*" value="{{$start_date !=NULL? $start_date:''}}" required/>
                  @if ($errors->has('start_date'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('start_date') }}</strong>
                  </span>
                  @endif
              </div>
          </div>
          <div class="col-sm-3">
              <div class="form-group my-0">
                  <input type="text" class="myDate form-control {{ $errors->has('end_date') ? ' is-invalid' : '' }}" id="end_date" name="end_date" placeholder="To*" value="{{$end_date !=NULL? $end_date:''}}" required/>
                  @if ($errors->has('end_date'))
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('end_date') }}</strong>
                  </span>
                  @endif
              </div>
          </div>
          <div class="col-sm-3">
            <button class="btn btn-success"><i class="fa fa-search"></i> Search</button>
          </div>
        </form>
      </div>
    <div class="card-body">
      @if($start_date && $end_date)
      <div class="row d-flex justify-content-center">
        <div class="col-sm-4">
          <div class="card-body">
            <p class="my-0"><strong>Employee Name : {{$employee_info->name}}</strong></p>
            <p><strong>From {{$start_date}}  To {{$end_date}}</strong></p>
          </div>
        </div>
      </div>
       <div class="row">
        <div class="col-sm-6">
          <h5>Salary Amount</h5>
          <table class="table table-bordered">
            <thead class="bg-success">
              <tr>
                <td>Sl</td>
                <td>Date</td>
                <td>Head</td>
                <td>Salary Amount</td>
              </tr>
            </thead>
            <tbody>
              @php
                $totalsalary = 0;
              @endphp
              @foreach($salaries as $salary)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$salary->date}}</td>
                <td>{{$salary->salaryhead->title}}</td>
                <td>{{$salary->salary}}</td>
              </tr>
                @php
                 $totalsalary =+ $salary->salary;
                @endphp
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <td></td>
                <td></td>
                <td>Total Salary</td>
                <td>{{$totalsalary}}</td>
              </tr>
            </tfoot>
          </table>
        </div>
        <div class="col-sm-6">
          <h5>Salary Payment</h5>
          <table class="table table-bordered">
            <thead class="bg-success">
              <tr>
                <td>Sl</td>
                <td>Date</td>
                <td>Note</td>
                <td>Amount</td>
              </tr>
            </thead>
            <tbody>
              @php
                $totalpayment = 0;
              @endphp
              @foreach($payments as $payment)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$payment->date}}</td>
                <td>{{$payment->note}}</td>
                <td>{{$payment->amount}}</td>
              </tr>
                @php
                 $totalpayment =+ $payment->amount;
                @endphp
              @endforeach
            </tbody>
            <tfoot>
              <tr>
                <td></td>
                <td></td>
                <td>Total Salary</td>
                <td>{{$totalsalary}}</td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 text-center">
          <h6 class="text-success">Salary Left = {{$totalsalary - $totalpayment}}</h6>
          <div class="text-right"><button onclick="window.print()" class="btn btn-danger"><i class="fa fa-print"></i></button></div>
        </div>
      </div>
      @endif
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
   @if($start_date && $end_date)
   <script>
      document.forms['editForm'].elements['employee_id'].value={{$employee_info->id}}
   </script>
   @endif
@endsection