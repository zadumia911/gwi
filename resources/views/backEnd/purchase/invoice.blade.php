
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Purchase Report</title>
<link rel="stylesheet" href="{{asset('public/backEnd/admin')}}/plugins/fontawesome-free/css/all.min.css" />
<link rel="stylesheet" href="{{asset('public/backEnd/admin')}}/dist/css/adminlte.min.css">
<style type="text/css">
    .content-header{
      border-bottom: 1px solid #ddd
    }
    .btn{
      border-radius: 0px;
    }
    #scroll{
        width: 100%;
        overflow-x: scroll;
       /* height:530px; */  
    }
     table>thead{
      background: #00758F;
      color:#fff;
    }
    input, textarea, button, a.btn {
    outline: none;
    box-shadow:none !important;
    border:1px solid #ccc !important;
    }
    input:read-only { 
      cursor:  not-allowed;
    }
    .fa-print:hover{
      cursor: pointer;
    }
    
 .footer {
    display: none;
    position: absolute;
    right: 0;
    bottom: 0;
    left: 0;
    padding: 1rem;
    text-align: center;
}
  #foot {
    display:none; 
    position: fixed;
    bottom: 0;
    width: 100%;
  }
  .nav-treeview{
    color: black;
    background: #0f2133 !important;
  }
@media print {
  
  .table-striped td, .table-striped th {
    border: 1px solid black !important;
    color : black !important;
    font-size: 22px !important;
}
.table-bordered td, .table-bordered th {
    border: 1px solid black;
}
}
 @media print{
    .hide_pr{
      display: none;
    }
    a{
      text-decoration: none;
    }
   #scroll{
    overflow: hidden;
   }
   #foot{
    display: block;
   }
   .footer{
    display: block;
   }
   
  }

 *{
  font-family: "Times New Roman";

  }
  </style>
  <script src="http://bondhon-bd.com/gwi/plugins/jquery/jquery.min.js"></script>
  <script src="http://bondhon-bd.com/gwi/auto/jquery.autocomplete.js"></script>

</head><style type="text/css">
  @media print{
    .hide_pr{
      display: none;
    }
    a{
      text-decoration: none;
    }
   #scroll{
    overflow: hidden;
   }
   #low_foot{
    display: block
  }#foot{
    display: block !important
  }
  .row{
      overflow:visible;
  }
  }
  strong{
    font-weight: bold;
  }
  .low_foot{
    display: none
  }
  #table{
    z-index:99;

  }
  #fb{
    background: url("{{asset('public/backEnd/img/wm.png')}}") no-repeat center center; 
    background-position: center;
    z-index:1;
     min-height: 1130px !important;
  }
  table.bcgi img {
      display :none;
  position: absolute;
  top: 15%;
  border: 1px solid transparent;
  text-align: center;
  left: 50%;
  transform: translateX(-50%);
  height: 275px;
  width: 813px;
}

</style>
<div style="margin:10px;">
  <span onclick="Reload()" class="btn btn-info hide_pr">Reload Page</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <span onclick="Print()" class="btn btn-info hide_pr">Print Page</span>
</div>
 
<!-- <div  style="padding:0;margin: 0px;" >
    
</div> 
<div  style="padding:0;margin: 0px;" >
   
</div> --> 
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <br>
     <div class="row invoice-info" style="margin-top: -20px">
      <div class="col-sm-4 invoice-col">
           <img src="http://bondhon-bd.com/gwi/assets/invoice/memohms.png" /><br>
            <span style="font-size: 35px;padding: 5px 13px;float:left;color:#000;font-weight:650;font-family:Eras ITC">PURCHASE ORDER</span>
      </div>
      <div class="col-sm-4 invoice-col"> 
        <span style="background:  #0055A6;font-size: 28px;color: #fff;padding: 5px 13px;border-radius:50px">Address</span>
        <div style="background: #E1E5F3;border-radius: 18px;padding: 10px;font-size:23px">
          189/a, Tejgaon Industrial Area (Babli)<br>
          Dhaka-1208, Bangladesh.<br>
          Phone : +880 1943589902<br>
          E-mail : greenworldintbd@gmail.com<br>
          Web. : www.greenworldbd.com
        </div>
      </div>
      <div class="col-sm-4 invoice-col"> 
         <span style="background:  #0055A6;font-size: 28px;color: #fff;padding: 5px 13px;border-radius:50px">Supplier</span>
        
        <div style="background: #E1E5F3;border-radius: 18px;padding: 10px;font-size:23px">
         Name : {{$invoice->supplier->supplier_name}}<br>
        <span style="font-size:21px"> Address : {{$invoice->supplier->supplier_address}}</span><br>
       <span style="font-size:21px">  Mobile : {{$invoice->supplier->supplier_phone}}</span><br>
       <span style="font-size:21px">  Email : {{$invoice->supplier->supplier_email}}</span><br>
       <span style="font-size:21px">  Web : {{$invoice->supplier->supplier_web}}</span><br>

        </div>
      </div>
      
    </div>
<br>
<br>
<div class="container-fluid" id="fb">
    <!-- Table row -->
    <div class="row" >
         <div class="col-12"  >
          
        <table style="width: 100%;font-size:19px !important;border-radius:50px" border="1" cellpadding="5"  cellspacing="5" >
          <thead style="background:#fff !important;color:#000 !important">
          <tr style="background: #0055A6;color: #fff">
            
            <th class="text-center"   style="font-size:18px !important;font-family:Eras ITC">ACCOUNT NO</th>
            <th class="text-center"   style="font-size:18px !important;font-family:Eras ITC">P.O NO</th>
            <th class="text-center"   style="font-size:18px !important;font-family:Eras ITC">P.O DATE</th>
            <th class="text-center"   style="font-size:18px !important;font-family:Eras ITC">INVOICE NO</th>
            <th class="text-center"   style="font-size:18px !important;font-family:Eras ITC">INVOICE DATE</th>
            
            <th class="text-center"   style="font-size:18px !important;font-family:Eras ITC">PAYMENT TERMS</th>
            <th class="text-center"   style="font-size:18px !important;font-family:Eras ITC">TOTAL DUE</th>
            
          </tr>
         </thead>
         <tbody>
          <tr>
            <td class="text-center" style="font-size:19px !important">{{$invoice->id}}</td>
            <td class="text-center" style="font-size:19px !important">{{$invoice->po}}</td>
            <td class="text-center" style="font-size:19px !important">{{$invoice->lc_date}}</td>
            <td class="text-center" style="font-size:19px !important">{{$invoice->id}}</td>
            <td class="text-center" style="font-size:19px !important">{{$invoice->lc_date}}</td>
            <td class="text-center" style="font-size:19px !important">{{$invoice->payment_method}}</td>
              <td class="text-right"  style="font-size:19px !important;color:red;font-weight:650"><stonrg><span style="float:left;">TK</span> {{$invoice->supplier->due}}</stonrg></td>
          </tr>
         </tbody>
        </table>
      </div>
      <div class="col-12 table-responsive">
          <table cellpadding="0" cellspacing="0">
        <table  style="width: 100%;font-size:19px !important;border-radius:10px;margin-top:5px;"   cellpadding="5" id="table" cellspacing="5" class="bcgi">
    <thead style="background:#fff !important;color:#000 !important;font-family:Eras ITC">
    <tr style="background: #0055A6;color: #fff">
      <th class="text-center" style="font-size:18px !important;font-family:Eras ITC">Sl</th>
      <th class="text-center" style="font-size:18px !important;font-family:Eras ITC">ITEM CODE</th>
    <th style="font-size:18px !important;font-family:Eras ITC" class="text-center">PRODUCT DESCRIPTION</th>
      <th class="text-center" style="font-size:18px !important;font-family:Eras ITC">QTY</th>
      <th class="text-center" style="font-size:18px !important;font-family:Eras ITC">UOM</th>
      <th class="text-center" style="font-size:18px !important;font-family:Eras ITC">UNIT PRICE</th>
      <th class="text-center" style="font-size:18px !important;font-family:Eras ITC"> AMOUNT</th>
    </tr>
    </thead>
    <tbody style="border-bottom:1px solid !important;border-left:1px solid !important;border-right:1px solid !important">
      @foreach($invoice->purchasedetails as $value)
      <tr >
      <td class="text-center"  style="font-size:19px !important;"><stonrg>{{$loop->iteration}}</stonrg></td>
      <td  style="font-size:19px !important;background:#CCD1D1" class="text-center"><stonrg>{{$value->id}}</stonrg></td>
      <td  style="font-size:19px !important" ><stonrg>{{$value->product->pro_name}}</stonrg></td>
      <td class="text-center" style="font-size:19px !important;background:#CCD1D1"><stonrg>{{$value->quantity}}</stonrg></td>
      <td class="text-center"  style="font-size:19px !important"><stonrg>{{$value->size}}</stonrg></td>
      
      <td class="text-center"  style="font-size:19px !important"><stonrg><span style="float:left">TK</span> {{$value->sale_price}}</td>
      <td class="text-right"  style="font-size:19px !important;background:#CCD1D1"><stonrg><span style="float:left">TK</span> {{$value->quantity*$value->sale_price}}</stonrg></td>
    </tr>
    @endforeach
    </tbody>
    <tfoot class="borderno" style="border:0px !important">
      <tr style="border:0px !important">
        <td style="border:0px !important">
            <img src="{{asset('public/backEnd/img/wm.png')}}">
        </td>
    </tr>
    </tfoot>
  </table>
  </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row" >
    <div class="col-md-12" >
        <div class="col-md-6" style="float: left;font-size:20px">
           Please cross all cheques made payable to <b>GREEN WORLD INTERNATIONAL</b>
          Any claims on the merchandise delivered must be lodged on their time of receipt.
          <br>
          <b>IN WORD</b>: Thirty Six Lakhs Fifty Four Thousands Three Hundred  and Forty Eight  Taka Only.        </div>
        <div class="col-md-2 text-right" style="float: left;font-size:20px">
        </div>
      <div class="col-md-4" style="float: left">
        <div class="table-responsive">
          <table style="width: 100%;font-size:19px !important"  cellpadding="5">
                        <tr >
              <th class="text-right">Subtotal: </th>

              <td class="text-right" style="font-weight:bold"><span style="float:left">TK</span> {{$invoice->total_amount -($invoice->discount+$invoice->vat)}}</td>
            </tr>
            <tr >
              <th class="text-right">Discount:</th>

              <td class="text-right" style="font-weight:bold"><stonrg><span style="float:left">TK</span> {{$invoice->discount}}</stonrg></td>
            </tr>
            <tr style="height: 20px;display: none;">
              <th class="text-right">VAT RATE  0.00% : </th>

              <td class="text-right" style="font-weight:bold"><stonrg>TK {{$invoice->vat}}</stonrg></td>
            </tr>
            
            <tr style="height: 20px;display: none;">
              <th class="text-right">Net Payble: </th>

              <td class="text-right" style="font-weight:bold"><stonrg>TK {{$invoice->due_amount}}</stonrg></td>
            </tr>
            <tr style="height: 20px;display: none;">
              <th class="text-right">Paid Amount: </th>

              <td class="text-right" style="font-weight:bold"><stonrg>TK {{$invoice->paid_amount}}</stonrg></td>
            </tr>
                                  
            <tr >
              <th class="text-right">Total Amount:  </th>

              <td class="text-right" style="font-weight:bold"><stonrg><span style="float:left">TK</span> {{$invoice->total_amount}}</stonrg></td>
            </tr>
          </table>
        </div>
      </div>
      </div>
    </div>
<br>
<br>
<br>
<br>
 <div class="row invoice-info" >
       
 
      
      <div class="col-sm-4 invoice-col"  style="font-size: 24px">
        
          <b >Authorise Signature</b><br> <span style="font-size:24px;line-height:1em">.................................................................</span>
          <br> <b>GREEN WORLD INTERNATIONAL</b> 
      </div>
      
      
      <div class="col-sm-3 invoice-col"  style="font-size: 30px">
          
        
      </div>
     <div class="col-sm-4 invoice-col"  style="font-size: 24px">
        
          <b >Supplier Name & Signature</b><br> <span style="font-size:24px;line-height:1em">.............................................................</span>
          <br> <b> Received in good order & condition</b> 
      </div>
      
    </div>
</div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>

  
  <script type="text/javascript">
    function Reload() {
      window.location.reload();
    }
     function Print() {
      window.print();
    }
  </script>
<footer class="main-footer footer" id="foot" style="font-size:30px">
          All Kind of Food & Non Food Product Importer & Distributor<br>
          <b style="margin-left: 31px"> <i>Thank you for business with us</i></b>
  </footer>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script type="text/javascript">
    $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();
    $('#datepicker').daterangepicker()
    });
</script>
<script type="text/javascript">
  $(document).ready(function() {
   $('#scroll').floatingScroll();
   $('#table-div').floatingScroll();
   $('#table-div-right').floatingScroll();
  });    
</script>
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
</body>
</html>