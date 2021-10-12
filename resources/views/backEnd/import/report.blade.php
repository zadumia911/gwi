@extends('backEnd.layouts.master')
@section('title','Import Manage')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <div class="page-title">
            <h6>Import Manage</h6>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="short-icon text-right">
            <a href="{{url('editor/import/add')}}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                      <input type="text" class="form-control" name="invoice_id" placeholder="Invoice" value="{{$invoice_id}}">
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
            <th>Date</th>
            <th>LC Number</th>
            <th>PO</th>
            <th>Local Cost</th>
            <th>USD Rate</th>
            <th>SGD Rate</th>
            <th class="action_button">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($show_datas as $key=>$value)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$value->import_date}}</td>
            <td>{{$value->po_number}}</td>
            <td>{{$value->usd_rate}}</td>
            <td>{{$value->sgd_rate}}</td>
            <td>{{$value->local_cost}}</td>
            <td>{{$value->quantity}}</td>
            <td><a href="{{url('editor/import/report/'.$value->id)}}" onclick="return PopWindow(this.href, 'target')"> <span class="fa fa-print" title="Print Page" style="font-size: 30px;"></span> </a>
              </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
<script language="JavaScript" type="text/javascript">
    function PopWindow(url, win)
    {
        var ptr = window.open(url, win,
                'width=850,height=500,top=100,left=250');
        return false;
    }
    function Reload(){
    location.reload();
  }
   function Print(){
    window.print();
  }
</script>
@endsection