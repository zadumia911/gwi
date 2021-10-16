@extends('backEnd.layouts.master')
@section('title','Local Cost Manage')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <div class="page-title">
            <h6>Local Cost Manage</h6>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="short-icon text-right">
            <a href="{{url('editor/localcost/add')}}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
            <th>Receiving Date</th>
            <th>LC Number</th>
            <th>LC Opening Date</th>
            <th>LC Amount USD</th>
            <th>Exporter</th>
            <th>C&F Name</th>
            <th>Shipping Port</th>
            <th>Bank Details</th>
            <th>Final Destination</th>
            <th>Purchase Order</th>
            <th>Supplier Invoice</th>
            <th>Local Cost</th>
            <th class="action_button">Action</th>
          </tr>
        </thead>
        <tbody>
          @php
            $lcamount = 0;
            $localcost = 0;
          @endphp
          @foreach($show_datas as $key=>$value)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$value->receive_date}}</td>
            <td>{{$value->lc_no}}</td>
            <td>{{$value->lc_date}}</td>
            <td>{{$value->lc_amount}}</td>
            <td>{{$value->supplier?$value->supplier->supplier_name:'$value->supplier'}}</td>
            <td>{{$value->agent?$value->agent->cf_name:''}}</td>
            <td>{{$value->shipping_port}}</td>
            <td>{{$value->bank->bank_name}}</td>
            <td>{{$value->destination?$value->destination->destination_name:''}}</td>
            <td>{{$value->po}}</td>
            <td>{{$value->supplier_invoice}}</td>
            <td>{{App\LocalCostDetails::where('cost_id',$value->id)->sum('amount')}}</td>
             <td> 
              <form action="{{url('editor/localcost/delete')}}" method="POST">
                  @csrf
                  <input type="hidden" name="hidden_id" value="{{$value->id}}">
                  <button type="submit" onclick="return confirm('Are you delete this user?')" class="btn btn-danger"><i class="fa fa-times"></i></button>
                </form>
              </td>
          </tr>
          @php
            $lcamount += $value->lc_amount;
            $localcost += App\LocalCostDetails::where('cost_id',$value->id)->sum('amount');
          @endphp
          @endforeach
        </tbody>
         <tfoot>
          <tr>
            <td>Total</td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{$lcamount}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{$localcost}}</td>
            <td></td>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

@endsection