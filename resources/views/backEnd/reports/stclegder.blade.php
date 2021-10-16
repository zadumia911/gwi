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
                    <select name="product_id" class="form-control">
                      <option value=" ">Select Product</option>
                      @foreach($products as $value)
                      <option value="{{$value->id}}">{{$value->pro_name}}</option>
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

@endsection