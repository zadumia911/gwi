@extends('backEnd.layouts.master')
@section('title','Local Cost Report')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <div class="page-title">
            <h6>Local Cost Report</h6>
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
            <th>Status</th>
            <th class="action_button">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($show_datas as $key=>$value)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$value->receive_date}}</td>
            <td>{{$value->lc_number}}</td>
            <td>{{$value->lc_date}}</td>
            <td>{{$value->lc_amount}}</td>
            <td>{{$value->supplier?$value->supplier->supplier_name:'$value->supplier'}}</td>
            <td>{{$value->agent?$value->agent->cf_name:''}}</td>
            <td>{{$value->shipping_port}}</td>
            <td>{{$value->bank->bank_name}}</td>
            <td>{{$value->destination?$value->destination->destination_name:''}}</td>
            <td>{{$value->gw_po}}</td>
            <td>{{$value->supplier_invoice}}</td>
            <td>{{App\LocalCostDetails::where('cost_id',$value->id)->sum('amount')}}</td>
             <td> 
              <form action="{{url('editor/localcost/delete')}}" method="POST">
                  @csrf
                  <input type="hidden" name="hidden_id" value="{{$value->id}}">
                  <button type="submit" onclick="return confirm('Are you delete this user?')" class="btn btn-danger"><i class="fa fa-times"></i></button>
                </form>
              </td>
            <td>{{$value->barcode}}</td>
            <td>{{$value->pro_name}}</td>
            <td>{{$value->category->category_name}}</td>
            <td>{{$value->brand->brand_name}}</td>
            <td>{{$value->pack_size}}</td>
            <td>{{$value->status ==1 ? 'Active' : 'Inactive'}}</td>
            <td class="action_button">
              <ul class="manage-btn-group">
                <li><a href="{{url('editor/localcost/edit/'.$value->id)}}" class="btn btn-info"><i class="fa fa-edit"></i></a></li>
                <li>@if($value->status==1)
                  <form action="{{url('editor/localcost/inactive')}}" method="POST">
                      @csrf
                      <input type="hidden" name="hidden_id" value="{{$value->id}}">
                      <button type="submit" class="btn btn-secondary" title="Inactive" onclick="return confirm('Are you want change this?')"><i class="fa fa-thumbs-down"></i></button>
                  </form>
                @else
                <form action="{{url('editor/localcost/active')}}" method="POST">
                  @csrf
                  <input type="hidden" name="hidden_id" value="{{$value->id}}">
                  <button type="submit" class="btn btn-success"  onclick="return confirm('Are you want change this?')" title="Active"><i class="fa fa-thumbs-up"></i></button> 
                </form></li>
                @endif
                 <li>
                  <form action="{{url('editor/localcost/delete')}}" method="POST">
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
        <tfoot>
          <tr>
            <td>Total</td>
            <td></td>
            <td></td>
            <td></td>
            <td>5000</td>
            <td></td>
            <td></td>
            <td></td>
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