@extends('backEnd.layouts.master') 
@section('title','Dashboard') 
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div>
      <!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <!-- =========================== -->
        <!-- Sales & Returns -->
    <!-- =========================== -->
    <div class="row">
      <div class="col-md-12">
        <div class="dash-category-title">
          <h3>Sales & Returns</h3>          
        </div>
      </div>
    </div>
    <div class="row">
      <!-- Net Sales -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{$netsale}}</h3>

            <p>Net Sales</p>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-cart"></i>
          </div>
          <a href="{{url('editor/sale/report')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <!-- Sale Due -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{$saledue}}</h3>

            <p>Sale Due</p>
          </div>
          <div class="icon">
            <i class="fa fa-money-bill-alt"></i>
          </div>
          <a href="{{url('editor/sale/report')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <!-- Sale Return -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>0</h3>

            <p>Sale Return</p>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-bag"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <!-- Return Due -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>0</h3>
            <p>Return Due</p>
          </div>
          <div class="icon">
            <i class="fa fa-credit-card"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- =========================== -->
        <!-- Purchase & Returns -->
    <!-- =========================== -->  
    <div class="row">
      <div class="col-md-12">
        <div class="dash-category-title">
          <h3>Purchase & Returns</h3>          
        </div>
      </div>
    </div>
    <div class="row">
      <!-- Purchase -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{$purchase}}</h3>
            <p>Purchase</p>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-cart"></i>
          </div>
          <a href="{{url('editor/purchase/report')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <!-- Purchase Due -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{$purchase_due}}</h3>

            <p>Purchase Due</p>
          </div>
          <div class="icon">
            <i class="fa fa-money-bill-alt"></i>
          </div>
          <a href="{{url('editor/purchase/report')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <!-- Purchase Return -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>0</h3>

            <p>Purchase Return</p>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-bag"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- Return Due -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>0</h3>

            <p>Return Due</p>
          </div>
          <div class="icon">
            <i class="fa fa-credit-card"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <!-- ./col -->
    </div>
    <!-- /.row -->    

    <!-- =========================== -->
        <!-- Collection & Payment -->
    <!-- =========================== -->
    <div class="row">
      <div class="col-md-12">
        <div class="dash-category-title">
          <h3>Collection & Payment</h3>          
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{$cash_collection}}</h3>

            <p>Cash Collection</p>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-cart"></i>
          </div>
          <a href="{{url('admin/customer/collection/report')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{$bank_collection}}</h3>

            <p>Bank Collection</p>
          </div>
          <div class="icon">
            <i class="fa fa-money-bill-alt"></i>
          </div>
          <a href="{{url('admin/customer/collection/report')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{$cash_payment}}</h3>

            <p>Cash Payment</p>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-bag"></i>
          </div>
          <a href="{{url('admin/supplier/payment/report')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{$bank_payment}}</h3>

            <p>Bank Payment</p>
          </div>
          <div class="icon">
            <i class="fa fa-credit-card"></i>
          </div>
          <a href="{{url('admin/supplier/payment/report')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->

    <!-- =========================== -->
        <!-- Accounts -->
    <!-- =========================== --> 
    <div class="row">
      <div class="col-md-12">
        <div class="dash-category-title">
          <h3>Accounts</h3>          
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{$expence}}</h3>
            <p>Expense</p>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-cart"></i>
          </div>
          <a href="{{url('editor/dailyexpense/manage')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{$cash_hand}}</h3>

            <p>Cash In Hand</p>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-bag"></i>
          </div>
          <a href="{{url('editor/sale/report')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{$netsale - $cost_amount}}</h3>

            <p>Profit</p>
          </div>
          <div class="icon">
            <i class="fa fa-money-bill-alt"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->    

    <!-- =========================== -->
        <!-- Product -->
    <!-- =========================== -->
    <div class="row">
      <div class="col-md-12">
        <div class="dash-category-title">
          <h3>Product</h3>          
        </div>
      </div>
    </div>
    <div class="row">
      <!-- Product Out -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{$product_out}}</h3>

            <p>Product Out</p>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-cart"></i>
          </div>
          <a href="{{url('editor/sale/report')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <!-- Total Stock -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{$total_stock}}</h3>

            <p>Total Stock</p>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-bag"></i>
          </div>
          <a href="{{url('editor/product/manage')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <!-- Production Cost Price -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>0</h3>

            <p>Production Cost Price</p>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-bag"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <!-- Sale Price -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{$sale_price}}</h3>
            <p>Sale Price</p>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-bag"></i>
          </div>
          <a href="{{url('editor/product/manage')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <!-- Customer -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{$total_customer}}</h3>

            <p>Customer</p>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-cart"></i>
          </div>
          <a href="{{url('editor/customer/manage')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <!-- Customer Due -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{$customer_due}}</h3>

            <p>Customer Due</p>
          </div>
          <div class="icon">
            <i class="fa fa-money-bill-alt"></i>
          </div>
          <a href="{{url('admin/customer/collection/report')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <!-- Total Supplier -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{$total_supplier}}</h3>
            <p>Total Supplier</p>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-bag"></i>
          </div>
          <a href="{{url('editor/supplier/manage')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <!-- Supplier Due -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{$supplier_due}}</h3>

            <p>Supplier Due</p>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-bag"></i>
          </div>
          <a href="{{url('admin/supplier/payment/report')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->    

    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection
