@extends('backEnd.layouts.master')
@section('title','Account Cashbook')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <div class="page-title">
            <h6>Account Cashbook</h6>
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
       <table id="tbl_cus" class="table table-bordered table-striped table-hover cus-history-table">
        <thead>
            <tr class="tbl_color">
                <th class="text-center">Date</th>
                <th class="text-center">Description</th>
                <th class="text-center">Code</th>
                <th class="text-center">Name</th>
                <th class="text-center">Invoice</th>
                <th class="text-center">Debit</th>
                <th class="text-center">Credit</th>
                <th class="text-center">Balance</th>  
            </tr>
        </thead>
        <tbody>
          @foreach($collection as $value)
          <tr>
            <td class="text-center">{{$value->date}}</td>
            <td class="text-center"> Previous Balance </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="text-center">
              {{$value->paid}}                    
            </td>
          </tr> 
          @endforeach
          @foreach($expence as $value)
          <tr>
            <td class="text-center">{{$value->created_at->format('Y-m-d')}}</td>
            <td class="text-center"> {{$value->comment}} </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="text-center">
              {{$value->expense_amount}}                    
            </td>
          </tr> 
          @endforeach  
        </tbody>
    </table>

    <table class="table table-bordered table-hover table-striped">
      <tbody>
        <tr>
          <th class="text-center">Previous Balance : 5000</th>
          <th class="text-center">Today Expense : <span class="outCash"></span></th>               
        </tr>
        <tr>
          <th class="text-center">Today Cash Recv : <span class="inCash"></th>
          <th class="text-center">Cash In Hand : <span class="cashInHand"></span></th>               
        </tr>
        <tr>
          <th class="text-center">Total Cash Recv : <span class="totRecv"></th>
          <th class="text-center">Cash Balance : <span class="cashBal"></span></th>               
        </tr>
      </tbody>
    </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
<script>
function sortTable() {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("tbl_cus");
  switching = true;
  while (switching) {
    switching = false;
    rows = table.getElementsByTagName("tr");
    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      x = rows[i].getElementsByTagName("td")[0];
      y = rows[i + 1].getElementsByTagName("td")[0];
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        shouldSwitch= true;
        break;
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}
sortTable();
</script>
@endsection