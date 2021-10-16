@extends('backEnd.layouts.master')
@section('title','Stock Manage')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <div class="page-title">
            <h6>Stock Manage</h6>
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
      <table id="example1" class="table table-bordered table-responsive-sm">
        <thead>
          <tr>
            <th>SL</th>
            <th>Item No</th>
            <th>Item Name</th>
            <th>Pack Size</th>
            <th>Unit</th>
            <th>Expair Date</th>
            <th>Cost Price</th>
            <th>Sale Price</th>
            <th>Total In</th>
            <th>In Stock</th>
          </tr>
        </thead>
        <tbody>
          @foreach($show_datas as $key=>$value)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$value->id}}</td>
            <td>{{$value->product->pro_name}}</td>
            <td>{{$value->product->pack_size}}</td>
            <td>{{$value->size}}</td>
            <td>{{$value->expire_date}}</td>
            <td>{{$value->cost_price}}</td>
            <td>{{$value->sale_price}}</td>
            <td>{{$value->total_price}}</td>
            <td>{{$value->instock}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

@endsection