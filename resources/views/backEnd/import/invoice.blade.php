<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>GWI::@yield('title','Dashboard')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('public/backEnd/admin')}}/plugins/fontawesome-free/css/all.min.css" />
    <link rel="stylesheet" href="{{asset('public/backEnd/admin')}}/dist/css/adminlte.min.css">
    <!-- Main content -->
      <style type="text/css">
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
</head>
<body>
<div style="margin:10px;">
  <span onclick="Reload()" class="btn btn-info hide_pr"><i class="fas fa-sync-alt"></i></i> </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <span onclick="Print()" class="btn btn-success hide_pr"><i class="fa fa-print"></i></span>
  <span onclick="Hide()" class="btn btn-dark hide_pr"><i class="fa fa-eye"></i></span>
</div>
  <section class="invoice">
    <div class="row invoice-info" >
      <div class="col-sm-3 invoice-col">
           <img src="{{asset('public/backEnd/img/invoice-logo.png')}}" /><br>
            <span style="font-size: 30px;padding: 5px 13px;float:left;color:#000;font-weight:650;font-family:Eras ITC">IMPORT REPORT</span>
      </div>
      <div class="col-sm-5 invoice-col"> 
        <span style="background:  #0055A6;font-size: 28px;color: #fff;padding: 5px 13px;border-radius:50px 50px 50px  0px ">Import Details</span>
        <div style="background: #E1E5F3;border-radius: 0px 18px 18px 18px;padding: 10px;font-size: 18px;">
          Exporter Name : Ben Foods (S) Pte Ltd<br>
          Bank : Bank Asia Limited Banani 11 Branch<br>
          <span style="font-size:18px">  Lc Number : 209719011456</span><br>
           <span style="font-size:19px">  Destination Port : Chittagong Port</span><br>
        <span style="font-size:19px"> C&F Agent : Sahadat </span><br>
        </div>
      </div>
      <div class="col-sm-4 invoice-col"> 
         <span style="background:  #0055A6;font-size: 28px;color: #fff;padding: 5px 13px;border-radius:50px 50px 50px  0px ">Import Info.</span>
        <div style="    background: #E1E5F3;border-radius: 0px 18px 18px 18px; padding: 10px;font-size: 18px;">
        
       <span style="font-size:19px">  Purchae Order No : {{$invoice->go_no}}</span><br>
       <span style="font-size:19px">  Supplier Invoice No : {{$invoice->id}}</span><br>
       <span style="font-size: 19px">Exchange Rate USD : {{$invoice->usd_rate}}</span>, <span style="font-size: 21px"> SGD : {{$invoice->sgd_rate}}</span><br>
       <span style="font-size: 19px">Total Qty : {{$invoice->quantity}}</span><br> <span style="font-size: 21px">Local Cost : {{$invoice->local_cost}}</span><br>
        </div>
      </div>
    </div>
    <div class="row invoice-info">
      <div class="col-sm-1 invoice-col">
      </div>
      <div class="col-sm-4 invoice-col">
      </div><br>
      <div class="col-sm-3 invoice-col">
      <br>
      </div>
      <div class="col-sm-4 invoice-col">
      </div>
    </div> 
    <!-- /.row -->
    <div class="container-fluid" id="fb">
    <!-- Table row -->
    <div class="row"  style="margin-top:10px;">
      <div class="col-12 table-responsive">
      <br>
         <table  border="1" cellpadding="2">
                <tr>
                  <th class="text-center">Sl</th>
                  <th class="text-center">HS Code</th>      
                  <th class="text-center" style="width:60px !imortant">Item Name</th>
                  <th class="text-center">Pack Size</th>
                  <th class="text-center">CTN</th>
                  <th class="text-center">PCS</th>
                  <th class="text-center hide1" >Net Weight</th>
                  <th class="text-center" >Unit Price Pcs</th>
                  <th class="text-center hide1" >Unit Price Ctn</th>
                  <th class="text-center">Total Value</th>
                  <th class="text-center" >Unit Price Pcs (TK)</th>
                  <th class="text-center hide1" >Duty Asst USD</th>
                  <th class="text-center hide1" >Duty %</th>        
                  <th class="text-center">Total Duty Item</th>       
                  <th class="text-center">Duty Per Pcs</th>                 
                  <th class="text-center">Local Cost Pcs</th>          
                  <th class="text-center">Cost Per Pcs</th>                 
                  <th class="text-center">Total Cost</th>                 
                  <th class="text-center">Profit (%)</th>                 
                  <th class="text-center hide1">Sale Price</th>
                  <th class="text-center hide1">Total Sale Price</th>
                  <th class="text-center">Total Gross Profit</th>   
                </tr>
                  @php
                    $totalctn = 0;
                    $totalpcs = 0;
                    $totalweight = 0;
                    $totalvalue = 0;
                    $saleprice = 0;
                    $totalsale = 0;
                 @endphp
                  @foreach($invoice->importdetails as $key=>$value)
                  <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td class="text-center">{{$value->hs}}</td>
                    <td class="text-center" ><input type="text" value="{{$value->product->pro_name}}" style="width:250px !important;border:none !important;"></td>
                    <td class="text-center">{{$value->pack}} X {{$value->size}}</td>
                    <td class="text-center">{{$value->cartoon}}</td>
                    <td class="text-center">{{$value->quantity}}</td>
                    <td class="text-center hide1">{{$value->quantity*$value->size}}</td>
                    
                    <td class="text-center">{{$value->ppp}} {{$value->currency}}</td>
                    <td class="text-center hide1">{{$value->ppp*$value->cartoon}} {{$value->currency}}</td>
                    <td class="text-center">{{$value->ppp*$value->quantity}} {{$value->currency}}</td>
                    <td class="text-center">
                      {{$invoice->usd_rate}}                
                    </td>
                    <td class="text-center hide1">{{$value->duty_assign}}</td>
                    <td class="text-center hide1">{{$value->duty_p}}</td>
                    <td class="text-center">801864.00</td>
                    <td class="text-center">36.12</td>
                    <td class="text-center">{{$invoice->local_cost/$invoice->quantity}}</td>
                    <td class="text-center">{{$value->cost_price}}</td>
                    <td class="text-center">{{$value->cost_price*$value->quantity}}</td>
                    <td class="text-center">{{$value->margin}} %</td>
                    <td class="text-center hide1">{{$value->sale_price}}</td>
                    <td class="text-center hide1">{{$value->sale_price*$value->quantity}}</td>
                    <td class="text-center">{{round(($value->sale_price*$value->quantity)-($value->cost_price*$value->quantity),2)}}</td>
                 </tr>  
                 @php 
                   $totalctn += $value->cartoon;
                   $totalpcs = $value->quantity;
                   $totalweight = $value->quantity*$value->size;
                   $totalvalue = $value->quantity*$value->ppp;
                   $saleprice = $value->sell_price;
                   $totalsale = $value->quantity*$value->sell_price;
                 @endphp 
                 @endforeach       
                <tfoot>
                  <tr>
                    <th colspan="4">Total</th>
                    <th class="text-center">1950.00</th>
                    <th class="text-center">23400.00</th>
                    <th class="text-center hide1">23400.00</th>
                    <th class="text-center"></th>
                    <th class="text-center hide1"></th>
                    <th class="text-center">27030.00</th>
                    <th class="text-center">163.20</th>
                    <th  class="text-center hide1"></th>
                    <th  class="text-center hide1"></th>
                    <th colspan="6" class="text-center"></th>
                     <th class="text-center hide1">3755848.12</th>
                     <th class="text-center">101564.42</th>
                  </tr>
                </tfoot>
              </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-6">

      </div>
      <!-- /.col -->
      <div class="col-6">

      </div>
      <!-- /.col -->
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
    function Hide() {
      //  alert('hide');
      $('.hide1').css("display","none");
    }
  </script>
<footer class="main-footer footer" id="foot" style="font-size:30px">
    All Kind of Food & Non Food Product Importer & Distributor<br>
    <b style="margin-left: 31px"> <i>Thank you for business with us</i></b>
  </footer>
</body>
</html>