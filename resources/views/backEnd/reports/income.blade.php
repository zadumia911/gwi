@extends('backEnd.layouts.master')
@section('title','income Report')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <div class="page-title">
            <h6>income Report</h6>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>
  <div class="card">
      <div class="card-body">
          <form method="get" class="form-row">
              <div class="col-sm-4">
                  <div class="form-group">
                      <input type="date" class="form-control" name="start_date" placeholder="Start Date" value="{{$start_date}}">
                  </div>
              </div>
              <div class="col-sm-4">
                  <div class="form-group">
                      <input type="date" class="form-control" name="end_date" placeholder="End Date" value="{{$end_date}}">
                  </div>
              </div>
              <div class="col-sm-4">
                  <div class="form-group">
                     <button class="btn btn-success"> <i class="fa fa-search"></i> </button>
                  </div>
              </div>
          </form>
      </div>
  </div>
  <div class="card">
    <div class="card-body">
      <table id="example1" class="table table-striped table-responsive-sm">
        <tbody>
           <tr>
             <td><strong>Total Sale :-</strong></td>
             <td class="text-right">{{$total_sale}}</td>
           </tr>
           <tr>
             <td><strong>(-) Sale Discount :-</strong></td>
             <td class="text-right">{{$total_discount}}</td>
           </tr>
           <tr>
             <td><strong>Net Sale :-</strong></td>
             <td class="text-right">{{$total_sale-$total_discount}}</td>
           </tr>
           <tr>
             <td><strong>(-)Cost of Goods :-</strong></td>
             <td class="text-right">{{$cost_amount}}</td>
           </tr>
           <tr>
             <td><strong>Gross Profit :-</strong></td>
             <td class="text-right">{{$total_sale-($total_discount+$cost_amount)}}</td>
           </tr>
           <tr>
             <td><strong>(-)Expenses :-</strong></td>
             <td class="text-right">{{$expence}}</td>
           </tr>
           <tr>
             <td><strong>Net Profit :-</strong></td>
             <td class="text-right">{{$total_sale-($total_discount+$cost_amount+$expence)}}</td>
           </tr>
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

@endsection