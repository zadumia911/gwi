@extends('backEnd.layouts.master') 
@section('title','Sale Add') 
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <div class="page-title">
                    <h6>Sale Add</h6>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="short-icon text-right">
                    <a href="{{url('editor/sale/manage')}}" class="btn btn-primary"><i class="fa fa-eye"></i> Manage</a>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="card">
<<<<<<< HEAD
   <div class="card-body">
      <form id="cusSupForm">
          
          <div class="row">
               <div class="col-md-4">
                <div class="form-group">
                  <label>Bill No.</label>
                  <input type="text"  placeholder="Bill Number" class="form-control" name="bill" id="bill" readonly="readonly" value="{{date('Ymd')}}{{$bill_no}}">
                </div>              
              </div>
              <div class="col-md-4" style="display:none">
                <div class="form-group">
                  <label>Challan No.</label>
                  <textarea placeholder="Challan Number" class="form-control" name="chalan"></textarea>
                </div>              
              </div>
               <div class="col-md-4">
                <div class="form-group">
                  <label>Employee Name</label>
                  <select class="form-control select2" name="employee_id" id="employee">
                    <option value="">Select Employee</option>
                    @foreach($employees as $key=>$value)
                      <option value="{{$value->id}}">{{$value->name}}</option>
                      @endforeach
                  </select>
                </div>              
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Customer Name</label>
                  <select class="form-control select2" name="customer_id" id="customer_id">
                      <option value="">Select Customer</option>
                      @foreach($customers as $key=>$value)
                         <option value="{{$value->id}}"> {{$value->customer_name}}</option>
                         @endforeach
                    </select>
                </div>              
              </div>
               <div class="col-md-4" >
                <div class="form-group">
                  <label>PO No.</label>
                  <input type="text" placeholder="PO Number" class="form-control" name="po">
                </div>              
              </div>
            <div class="col-md-4">
                <div class="form-group">
                  <label>Vat Challan</label>
                  <select class="form-control select2" name="vat_challan" id="vat_challan">
                      <option value="No"> No</option>
                      <option value="Yes"> Yes</option>
                  </select>
                </div>              
              </div>
              <div class="col-md-4" >
                <div class="form-group">
                  <label>Delivery Address.</label>
                  <input type="text" placeholder="Enter Address" class="form-control" name="delivery_address">
                </div>              
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Invoice Date</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                    <input type="text" onfocus="this.type='date'" onfocusout="this.type='text'" value="{{date('Y-m-d')}}" id="date" class="form-control" name="date">
                  </div>
                </div>
              </div> 
              <div class="col-md-4" >
                <div class="form-group">
                  <label>Delivery Date</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                    <input type="text" onfocus="this.type='date'" onfocusout="this.type='text'" value="{{date('Y-m-d')}}" id="delivery_date" class="form-control" name="delivery_date">
                  </div>
                </div>
              </div>
              
              <div class="col-md-4">
                <div class="form-group">
                  <label>Old Due</label>
                  <input type="text"  placeholder="0.00" class="form-control" readonly="readonly" id="old_balance">
                </div>              
              </div>
              <div class="col-md-4" style="display:none">
                <div class="form-group">
                  <label>Work Order No.</label>
                  <input type="text"  placeholder="Work Order" class="form-control" name="work_order" id="work_order">
                </div>              
              </div>
              
             </div>
            </form>
          <form id="product_form">
              
            <div class="row">              
             
             

              <div class="col-md-4">
                <div class="form-group">
                  <label>Item Name</label>
                  <select name="product_id" class="form-control select2" id="product_id" required="true">
                  <option value="" selected="selected">Select Item</option>
                  @foreach($products as $key=>$value)
                  <option value="{{$value->id}}">{{$value->product->pro_name}}</option>
                  @endforeach
                  <input type="hidden" name="hidden_instock" class="form-control" required="true" id="hidden_instock">
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label>Item Code</label>
                  <input type="text" name="item_code" placeholder="0.00" id="item_code" class="form-control" >
                </div>
              </div>
              
              <div class="col-md-4">
                <div class="form-group">
                  <label>Quantity</label>
                  <input type="text" name="quantity" placeholder="0.00" id="qty" class="form-control" required="true" onkeyup="calculate.call(this);">
                </div>
              </div>
              
              <div class="col-md-4">
                <div class="form-group">
                  <label>Unit Price</label>
                  <input type="text" name="sale_price" placeholder="0.00" id="unit_price" class="form-control" required="true"  onkeyup="calculate.call(this);">
                  <input type="hidden" name="cost_price" placeholder="0.00" id="cost_price" class="form-control" required="true" >
                   <input type="hidden"  placeholder="0.00" id="bqty" class="form-control">
                   
                  <input type="hidden" name="sale_price_hidden" placeholder="0.00"  value="0.00" id="sale_price_hidden" class="form-control" required="true" >
                </div>
              </div>
               
              <div class="col-md-4">
                <div class="form-group">
                  <label>Total Price</label>
                  <input type="text" name="total_price" placeholder="0.00" class="form-control" id="total_price" required="true" readonly="">
                  <input type="hidden" name="total_cost" placeholder="0.00" class="form-control" id="total_cost" required="true" readonly="">
                </div>
              </div>
             
              
              <div class="col-md-4">
                <div class="form-group">
                  <label id="stck_clr">Instock</label>
                  <input type="text" id="instock" name="instock" placeholder="0.00" class="form-control" required="true" readonly="">
                  
                 
                </div>
              </div> 
                             
            </div>
          </form>
             <a class="btn btn-info" id="add">Add List</a>    
            <form method="POST" id="add_form">
            <div class="row">
              <div class="col-md-9">
                <div id="table-div">
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th class="text-center">*</th>
                      <th class="text-center">Item Name</th>
                      <th class="text-center">Qty</th>
                      <th class="text-center">Sale Price</th>
                      <th class="text-center">Total Price</th>
                      <th class="text-center">Instock</th>
                      <th class="text-center">Action</th>
                      
                    </tr>
                    </thead>
                    <tbody>
                                          </tbody>  
                    <tfoot>
                      <tr>
                        <td colspan="4"><b style="color:#05731eed">Total</b></td>
                        <td ><input type="text" readonly="true" name="total_amount" value="0" id="total_amount" placeholder="0.00" style="width:100px;background: #ececec;padding-left: 5px;height: 30px;text-align: center;"><input type="hidden" readonly="true" name="cost_amount" value="0" id="total_cost_price" placeholder="0.00" style="width:100px;background: #ececec;padding-left: 5px;height: 30px;text-align: center;;font-weight: bold;font-size: 18px"></td>
                        <td colspan="3"></td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
              <div class="col-md-3" >
                <div id="table-div-right">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <td style="font-size: 22px;text-align: center;padding:10px 20px">Payments</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <div class="form-group" style="display: none;">
                            <label>Special Discount</label>
                            <input type="text" name="special_discount" placeholder="0.00"  id="special_discount" class="form-control" onkeyup="finalCalculator()" style="border-radius: 0px;font-weight: bold;font-size: 18px">
                           
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-group" >
                            <label>Discount (%)</label>
                            <input type="text" name="discount" placeholder="0.00"  id="discount" class="form-control" onkeyup="finalCalculator()" style="border-radius: 0px;font-weight: bold;font-size: 18px">
                            <input type="hidden" name="discount_p" placeholder="0.00"  id="discount_p" class="form-control"  style="border-radius: 0px;font-weight: bold;font-size: 18px">
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-group" >
                            <label>Vat (%)</label>
                             <input type="text" name="vat" placeholder="0.00"  id="vat" class="form-control" onkeyup="finalCalculator()" style="border-radius: 0px;font-weight: bold;font-size: 18px">
                             <input type="hidden" name="vatt" placeholder="0.00"  id="vatt" class="form-control"  style="border-radius: 0px;font-weight: bold;font-size: 18px">
                          </div>
                        </td>
                      </tr>
                      <tr style="display: none">
                        <td>
                          <div class="form-group" >
                            <label>Supplimentery Due</label>
                             <input type="text" name="sd" placeholder="0.00"  id="sd" class="form-control" onkeyup="finalCalculator()" style="border-radius: 0px;font-weight: bold;font-size: 18px">
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-group" style="display:none">
                            <label>Labour Cost</label>
                            <input type="text" name="lab_trans" placeholder="0.00"  id="lab_trans" class="form-control" onkeyup="finalCalculator()" style="border-radius: 0px;font-weight: bold;font-size: 18px">
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <div class="form-group">
                            <label>Cash Paid</label>
                            <input type="text" name="cash_paid" placeholder="0.00" id="cash_paid" class="form-control" onkeyup="finalCalculator()" style="border-radius: 0px;font-weight: bold;font-size: 18px">
                          </div>
                        </td>
                      </tr>
                      <tr >
                        <td>
                          <div class="form-group" style="display:none">
                            <label>Transport Name</label>
                              <select name="transport_id" class="form-control select2" id="transport_id" style="width: 100%;height:30px">
                              <option value="" selected="selected">Select Name</option>
                              <option value="6">COWHEAD</option>
                              <option value="7">ALFA</option>
                              <option value="8">HERSHEY</option>
                              <option value="9">NESTLE</option>
                              <option value="10">MONIN</option>
                              <option value="11">FRENCH CLASSIC</option>
                              <option value="12">AMERICAN GARDEN</option>
                              <option value="13">FOSTER CLARK</option>
                              <option value="14">KIKKOMAN</option>
                              <option value="15">FARMLAND</option>
                              </select>
                          </div>
                        </td>
                      </tr>
                       <tr >
                        <td>
                          <div class="form-group">
                            <label>Due Amount</label>
                            <input type="text" name="due" placeholder="0.00" id="due" value="0" class="form-control" style="border-radius: 0px;font-weight: bold;font-size: 18px" readonly="" required="">
                          </div>
                        </td>
                      </tr>
                      <tr >
                        <td>
                          <div class="form-group" >
                            <label>Payment Method</label>
                              <select class="form-control select2" style="width: 100%;height:30px" name="payment_method" id="payment_method" required="">
                                <option value="Cash">Cash</option>
                                <option value="Due">Dues</option>
                                <option value="Cheque">Cheque</option>
                              </select>
                          </div>
                        </td>
                      </tr>
                      

                      <tr class="bank">
                        <td>
                          <div class="form-group">
                            <label>Bank Name</label>
                            <select name="bank_id" class="form-control select2" id="bank_id" style="width: 100%;height:30px">
                              <option value="" selected="selected">Select Bank</option>
                              @foreach($banks as $value)
                              <option value="{{$value->id}}">{{$value->bank_name}}</option>
                              @endforeach
                              </select>
                          </div>
                        </td>
                      </tr>
                      <tr class="bank">
                        <td>
                          <div class="form-group">
                            <label>Check Number</label>
                            <input type="text" name="check_num" placeholder="xxx" id="check_num" class="form-control" style="border-radius: 0px">
                          </div>
                        </td>
                      </tr>
                      <tr class="bank">
                        <td>
                          <div class="form-group">
                            <label>Check Amount</label>
                            <input type="text" name="check_amount" placeholder="0.00" id="check_amn" class="form-control" style="border-radius: 0px">
                          </div>
                        </td>
                      </tr>
                      <tr class="bank">
                        <td>
                          <div class="form-group">
                            <label>Approve Date</label>
                            <input type="date" name="check_appr_date" placeholder="xxx"  id="check_appr_date" class="form-control" style="border-radius: 0px">
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="button" onclick="this.type='submit'" class="btn btn-info">Submit</button>
            </div>
          </form>
   </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
  //$('#name').focus();
      $('#customer_id').on('change',function(){
        var customer_id = $(this).val();
        $.ajax({
             type:'GET',
             url : "{{url('editor/customer/sale/collection')}}",
             data:{customer:customer_id},             
             success:function(res){
              if(res){
                var bal = res.customer_due;
                  $('#old_balance').val(bal);
                  $('#lwo').val(obj);
                  $('#name').focus();
               }
              }
      });
    });
      $('#product_id').on('change',function(){

        var product_id = $(this).val();
        checkAllName(product_id);
        $.ajax({
         type:'GET',
         url : "{{url('editor/sale/product-collection')}}",
         data:{product_id:product_id},
         success:function(res){
           //  alert(data);
            var stock = res.stock;          
            var price = res.sale_price;
            var cost = res.cost_price;
           $('#instock').val(parseFloat(stock));
           $('#hidden_instock').val(parseFloat(stock));
           $('#unit_price').val(parseFloat(price));
           $('#sale_price_hidden').val(parseFloat(price));
           $('#cost_price').val(parseFloat(cost));
           $("#qty").focus();
         }
         })
    });

  $('#product_form').on('keypress',function(e){
    if(e.which == 13) {
        AddData();    
    }
  });
  $('#add').on('click',function(e){
    //if(e.which == 13) {
        AddData();    
  //  }
  });

  $("#payment_method").on("change",function(){
      var met = $(this).val();
      if(met == 'Cheque')
        $('.bank').show();
      else
        $('.bank').hide();

  });



  
});
function checkAllName($name){

 var now = $name;
 $('#example2 tbody tr').each(function ()
    {
      $(this).find('.pro_id').each (function() {
        var pro_name = $(this).val();
        if(pro_name == now){
          alert('This Name Already in List');
          return false;
        }
      })
    }
  );
}


function AddData(e) {
   
    $('#add').attr('disabled',true);
    var product_id = document.getElementById("product_id").value;
    var unit_price = document.getElementById("unit_price").value;
    var cost_price = document.getElementById("cost_price").value;
    var qty = document.getElementById("qty").value;
    var total_price = document.getElementById("total_price").value;
    var total_cost = document.getElementById("total_cost").value;
    var instock = document.getElementById("instock").value;
    var hide_instock = document.getElementById("hidden_instock").value;
    var sale_price_hidden = document.getElementById("sale_price_hidden").value;
    var item_code = document.getElementById("item_code").value;

    if(unit_price < sale_price_hidden){
      alert("sale price cant be less than "+sale_price_hidden);
      $("#unit_price").focus();
      e.stopImmediatePropagation();
    }

   // var color = document.getElementById("clr").value;
    
   
    if(product_id == ''){
        alert('Item Cant be Empty');
        return false;
    }else if(qty == ''){
       alert('Quantity Cant be Empty');
       return false;
    }
    else if(unit_price == ''){
       alert('Unit Price Cant be Empty');
       return false;
    }

    else {

        var rows = "";
        var newRow = $("<tr>");
        var cols = "";
        var i = 0;
      cols += '<td style="text-align: center;"></td>';
      cols += '<td><select class="form-control select2 pro_id" style="width: 100%;height:30px;background-color:none" name="product_id[]" >@foreach($products as $key=>$value)<option value="{{$value->id}}"  >{{$value->product->pro_name}}</option>@endforeach     </select></td>';
      cols += '<td><input type="text" name="quantity[]" class="form-control qty" readonly="true" value="'+qty+'" style="background:none;border-radius:0px" onkeyup="calculator.call(this)" required="true"/><input type="hidden"  class="form-control hide_qty" name="hidden_qty" readonly="true" value="'+qty+'" style="background:none;border-radius:0px"/><input type="hidden"  class="form-control item_code" name="item_code[]" readonly="true" value="'+item_code+'" style="background:none;border-radius:0px"/></td>';
         
      cols += '<td><input type="text" name="sale_price[]" class="form-control up" readonly="true" value="'+unit_price+'" style="background:none;border-radius:0px" onkeyup="calculator.call(this)" readonly="" required="true"/><input type="hidden" name="cost_price[]" class="form-control cp" readonly="true" value="'+cost_price+'" style="background:none;border-radius:0px"  readonly="" required="true"/></td>';
      cols += '<td><input type="text" name="total_price[]" class="form-control tp" readonly="true" value="'+total_price+'" style="background:none;border-radius:0px"/><input type="hidden" name="total_cost[]" class="form-control tc" readonly="true" value="'+total_cost+'" style="background:none;border-radius:0px"/></td>';
      cols += '<td><input type="text" name="instock[]" class="form-control stock" readonly="true" value="'+instock+'" style="background:none;border-radius:0px"/><input type="hidden"  class="form-control hide_stock" name="hidden_instock[]" readonly="true" value="'+hide_instock+'" style="background:none;border-radius:0px"/></td>';

       cols += '<td> <a id="remCF" class="btn btn-sm ibtnDel"><i class="fa fa-trash" style="color:red"></i></a> </td>';
       
      newRow.append(cols);   
      $("#example2 tbody").append(newRow);   
       $(" .pro_id:last > option").each(function() {
         var ct = this.value;
         if(ct == product_id){
           $(this).attr('selected', 'selected');
         } 
        });
     $('.select2').select2();
      sl(); 
      $('#hidden_instock').val('0.00');  
     // save_float();
      ResetForm();
      AccountCalculation();
      $('#qty').focus();
      return false;
     }
}

function sl(){
  $('table#example2  tr').not(':first').not(':last').each(function($id){
  $(this).children().first().html($id + parseFloat(1));
})
}
function save_float(){
 $.ajax({
       type:'post',
       url : 'http://bondhon-bd.com/gwi/temp_sale',
       data: $('#product_form').serialize(),       
       success:function(res){
        console.log(res);
      }
  });
}
function AccountCalculation(){
    var sum = 0;
    var c = 0;

    $row = $('#example2 > tbody  > tr');
      $row.find('.tp').each (function() {
        sum += parseFloat($(this).val());
      })  
      $row.find('.tc').each (function() {
        c += parseFloat($(this).val());
      }) 
    $('#total_amount').val(sum.toFixed(2));
    $('#total_cost_price').val(c.toFixed(2));
    $('#due').val(sum.toFixed(2));
}
function calculator(){
  $row = $(this).closest("tr");
  var oldqty = parseFloat($row.find('.hide_qty').val());
  var qty = parseFloat($row.find('.qty').val());
  var price = parseFloat($row.find('.up').val());
  var cost = parseFloat($row.find('.cp').val());
  if(isNaN(qty))
    qty = 0;
  var total = qty * price;
  var tcost = qty * cost;
  if(isNaN(total)){
    total = 0;
  }
  if(isNaN(stck)){
    stck = 0;
  }
  $row.find('.tp').val(total.toFixed(2));
  $row.find('.tc').val(tcost.toFixed(2));
  AccountCalculation();
}
function finalCalculator(){
 var total_amount = parseFloat($('#total_amount').val()) || 0;
 var special_discount = parseFloat($('#special_discount').val()) || 0;
 var dis = parseFloat($('#discount').val()) || 0;
 var cash_paid = parseFloat($('#cash_paid').val()) || 0;
 var check_amount = parseFloat($('#check_amount').val()) || 0;
 var vatt = parseFloat($("#vat").val()) || 0;
 var sds = parseInt($("#sd").val()) || 0;
 var sd = parseFloat((total_amount * sds) / 100) || 0;
 var lab_trans = parseFloat($('#lab_trans').val()) || 0;
 
 var discount = (total_amount * dis) / 100;
 var vat = (total_amount * vatt) / 100;
 
 var due = total_amount - discount - cash_paid - check_amount + vat + lab_trans + sd - special_discount;
 $('#due').val(Math.round(due));
 $('#discount_p').val(Math.round(discount));
 $('#vatt').val(Math.round(vat));
}
function ResetForm() {
    document.getElementById("product_form").reset();
     $("#product_id").val(null).trigger('change');
    $('#add').attr('disabled',false);
}
function calculate() {
    var qty = parseFloat($("#qty").val()) || 0;
    var unit_price = parseFloat($("#unit_price").val()) || 0;
    var sale_price_hidden = parseFloat($("#sale_price_hidden").val()) || 0;
    var cost_price = parseFloat($("#cost_price").val()) || 0; 
    var hidden_instock = parseFloat($("#hidden_instock").val()) || 0; 
    
    //   if(sale_price_hidden > unit_price){
    //   $("#unit_price").val(sale_price_hidden);
    //   event.stopImmediatePropagation();
    // }
    if(hidden_instock < qty){
      qty = hidden_instock;
      $("#qty").val(qty);
      event.stopImmediatePropagation();
    }
    
    var total_price = unit_price * qty;
    var total_cost = cost_price * qty;
    var stock = hidden_instock - qty;

    
    $('#total_price').val(total_price.toFixed(2));
    $('#total_cost').val(total_cost.toFixed(2));
    $('#instock').val(stock.toFixed(2));
    
}
$("table#example2").on("click", ".ibtnDel", function (event) {
  $(this).closest("tr").remove(); 
  sl();
  AccountCalculation();
  finalCalculator();
});

$("table#example2").on("click", ".ibtnUp", function (event) {
  $row = $(this).closest("tr");
  $(this).hide(); 
  $row.find('.ibtnDo').show();
  $row.find('.qty').removeAttr('readonly');
  $row.find('.qty').css('background','#fff');
  $row.find('.up').removeAttr('readonly');
  $row.find('.up').css('background','#fff');
});
$("table#example2").on("click", ".ibtnDo", function (event) {
  $row = $(this).closest("tr");
  $(this).hide(); 
  $row.find('.ibtnUp').show();
  $row.find('.qty').attr('readonly',true);
  $row.find('.qty').css('background','none');
  $row.find('.up').attr('readonly',true);
  $row.find('.up').css('background','none');

});

</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#add_form').on('submit',function(e){
       
        if($("#customer_id").val() == ''){alert("Customer Cant be Empty");return false;}
        if($("#bill").val() == ''){alert("Bill Cant be Empty");return false;}

      var dataString = $("#add_form, #cusSupForm").serialize();
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
       });
      $.ajax({
             type:'post',
             url : "{{url('editor/sale/save')}}",
             data:dataString,            
             success:function(res){
               // if(res.status==='success'){
               //       toastr.success('Success!!','Data save successfully');
               //    }else{
               //      toastr.error('Opps!!','Data save failed');
               //    }
               //    setTimeout(function(){
               //       location.reload();
               //    },50);
             }
      });
       e.preventDefault();
    });
  });
</script>
=======
    <!-- form start -->
    <form action="{{url('/editor/sale/save')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="pro_name">Bill No.<span>*</span></label>
                        <input type="text" class="form-control {{ $errors->has('pro_name') ? ' is-invalid' : '' }}" id="pro_name" value="{{old('pro_name')}}" name="pro_name" placeholder="0.00" readonly />
                        @if ($errors->has('pro_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pro_name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="category_id">Employee Name <span>*</span></label>
                        <select class="form-control select2{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id" value="{{ old('category_id') }}" required>
                            <option value="">Select Employee</option>
                        </select>
                        @if ($errors->has('category_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('category_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="category_id">Customer Name <span>*</span></label>
                        <select class="form-control select2{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id" value="{{ old('category_id') }}" required>
                            <option value="">Select Customer</option>
                        </select>
                        @if ($errors->has('category_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('category_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="pro_name">PO No.<span>*</span></label>
                        <input type="text" class="form-control {{ $errors->has('pro_name') ? ' is-invalid' : '' }}" id="pro_name" value="{{old('pro_name')}}" name="pro_name" placeholder="0.00" readonly />
                        @if ($errors->has('pro_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pro_name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="category_id">Vat Challan <span>*</span></label>
                        <select class="form-control select2{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id" value="{{ old('category_id') }}" required>
                            <option value="1">No</option>
                            <option value="2">Yes</option>
                        </select>
                        @if ($errors->has('category_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('category_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="pro_name">Delivery Address<span>*</span></label>
                        <input type="text" class="form-control {{ $errors->has('pro_name') ? ' is-invalid' : '' }}" id="pro_name" value="{{old('pro_name')}}" name="pro_name" placeholder="0.00" readonly />
                        @if ($errors->has('pro_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pro_name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="join_date">Date</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" name="join_date" class="form-control myDate" />
                        </div>
                        @if ($errors->has('join_date'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('join_date') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="join_date">Date</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" name="join_date" class="form-control myDate" />
                        </div>
                        @if ($errors->has('join_date'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('join_date') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="pro_name">Old Due<span>*</span></label>
                        <input type="text" class="form-control {{ $errors->has('pro_name') ? ' is-invalid' : '' }}" id="pro_name" value="{{old('pro_name')}}" name="pro_name" placeholder="0.00" readonly />
                        @if ($errors->has('pro_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pro_name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="category_id">Item Name <span>*</span></label>
                        <select class="form-control select2{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id" value="{{ old('category_id') }}" required>
                            <option value="">Select PO</option>
                        </select>
                        @if ($errors->has('category_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('category_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="pack_size">Item Code<span>*</span></label>
                        <input type="text" class="form-control {{ $errors->has('pack_size') ? ' is-invalid' : '' }}" id="pack_size" value="{{old('pack_size')}}" name="pack_size" placeholder="0.00" readonly />
                        @if ($errors->has('pack_size'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pack_size') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="pack_size">Quantity<span>*</span></label>
                        <input type="text" class="form-control {{ $errors->has('pack_size') ? ' is-invalid' : '' }}" id="pack_size" value="{{old('pack_size')}}" name="pack_size" placeholder="0.00" readonly />
                        @if ($errors->has('pack_size'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pack_size') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="pack_size">Unit Price<span>*</span></label>
                        <input type="text" class="form-control {{ $errors->has('pack_size') ? ' is-invalid' : '' }}" id="pack_size" value="{{old('pack_size')}}" name="pack_size" placeholder="0.00" readonly />
                        @if ($errors->has('pack_size'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pack_size') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="pack_size">Total Price<span>*</span></label>
                        <input type="text" class="form-control {{ $errors->has('pack_size') ? ' is-invalid' : '' }}" id="pack_size" value="{{old('pack_size')}}" name="pack_size" placeholder="0.00" readonly />
                        @if ($errors->has('pack_size'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pack_size') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="pack_size">Instock<span>*</span></label>
                        <input type="text" class="form-control {{ $errors->has('pack_size') ? ' is-invalid' : '' }}" id="pack_size" value="{{old('pack_size')}}" name="pack_size" placeholder="0.00" readonly />
                        @if ($errors->has('pack_size'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pack_size') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->        
    </form>
    <div class="mx-4">
        <a href="" class="btn btn-info">Add List</a>        
    </div>
    <form action="">
        <div class="card-body">            
            <div class="row">
                <div class="col-sm-9">
                    <div id="table-div-left">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>*</th>
                                    <th>Item Name</th>
                                    <th>Qty</th>
                                    <th>Sale Price</th>
                                    <th>Total Price</th>
                                    <th>Instock</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div id="table-div-right">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>                                    
                                    <th>Payments</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label for="">Discount (%)</label>
                                            <input type="text" class="form-control" name="" placeholder="0.00">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label for="">Vat (%)</label>
                                            <input type="text" class="form-control" name="" placeholder="0.00">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label for="">Transport/Labour</label>
                                            <input type="text" class="form-control" name="" placeholder="0.00">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label for="">Discount</label>
                                            <input type="text" class="form-control" name="" placeholder="0.00">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label for="">Cash Paid</label>
                                            <input type="text" class="form-control" name="" placeholder="0.00">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label for="">Due Amount</label>
                                            <input type="text" class="form-control" name="" placeholder="0.00">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>                                        
                                        <div class="form-group">
                                            <label for="category_id">Payment Method <span>*</span></label>
                                            <select class="form-control" name="category_id" value="" required>
                                                <option value="">Cash</option>
                                                <option value="">Dues</option>
                                                <option value="">Cheque</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>                                        
                                        <div class="form-group">
                                            <label for="category_id">Bank Name <span>*</span></label>
                                            <select class="form-control" name="category_id" value="" required>
                                                <option value="">Cash</option>
                                                <option value="">Dues</option>
                                                <option value="">Cheque</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label for="">Check Number</label>
                                            <input type="text" class="form-control" name="" placeholder="0.00">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label for="">Check Amount</label>
                                            <input type="text" class="form-control" name="" placeholder="0.00">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label for="join_date">Approve Date</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                </div>
                                                <input type="text" name="join_date" class="form-control myDate" />
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-default">Clear</button>
            </div>
        </div>
    </form>
</div>

>>>>>>> 9e8535525d5c814aa12ad88f1279851724bf9c31
@endsection
