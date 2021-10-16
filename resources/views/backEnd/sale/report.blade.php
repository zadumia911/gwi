@extends('backEnd.layouts.master')
@section('title','Sale Report')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <div class="page-title">
            <h6>Sale Report</h6>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="short-icon text-right">
            <a href="{{url('editor/sale/add')}}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
            <th>Bill No</th>
            <th>Customer Name</th>
            <th>Total Amount</th>
            <th>Discount</th>
            <th>Paid</th>
            <th>Due Amount</th>
            <th class="action_button">Print</th>
          </tr>
        </thead>
        <tbody>
          @foreach($show_datas as $key=>$value)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$value->date}}</td>
            <td>{{$value->bill}}</td>
            <td>{{$value->customer->customer_name}}</td>
            <td>{{$value->total_amount}}</td>
            <td>{{$value->discount}}</td>
            <td>{{$value->cash_paid}}</td>
            <td>{{$value->due}}</td>
            <td class="action_button">
              <a href="{{url('editor/sale/report/'.$value->id)}}" onclick="return PopWindow(this.href, 'target')"> <span class="fa fa-print" title="Print Page" style="font-size: 30px;"></span> </a>
          </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
<script type="text/javascript">
    function check() {
        var res = confirm("Are you Sure ? ");
        if (res) {
            return true;
        } else {
            return false;
        }
    }
</script>
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