@extends('backEnd.layouts.master') 
@section('title','Purchase Add') 
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <div class="page-title">
                    <h6>Purchase Add</h6>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="short-icon text-right">
                    <a href="{{url('editor/purchase/manage')}}" class="btn btn-primary"><i class="fa fa-eye"></i> Manage</a>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="card">
   <div class="card-body">
       <form id="cusSupForm">
        <div class="row">
        <div class="col-md-4">
            <div class="form-group">
              <label>Date</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                </div>
                <input type="text" onfocus="this.type='date'" onfocusout="this.type='text'" value="{{date('Y-m-d')}}" id="date" class="form-control" name="date">
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Supplier Type</label>
              <select name="type" class="form-control select2 cost_type">
                <option value="">Select Type</option>
                <option value="1">Local</option>
                <option value="2">Foreign</option>
              </select>
            </div>  
            </div>

            <div class="col-md-4">
            <div class="form-group">
              <label>Supplier Name</label>
              <select class="form-control select2" style="width: 100%;height:30px" name="supplier_id" required="" id="supplier">
                <option value="">Select Supplier</option>
              </select>
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
              <label>Old Due</label>
              <input type="text"  placeholder="0.00"  class="form-control" readonly="readonly" id="previous_balance">
            </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Po Number</label>
                <select name="po" class="form-control select2" id="po">
                  <option value="">Select Po</option>
                      @foreach($imports as $value)
                      <option value="{{$value->po_number}}">{{$value->po_number}}</option>
                      @endforeach
                  </select>
              </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group">
                  <label>Lc Number</label>
                    <input type="text" name="lc" placeholder="0.00"  class="form-control"  id="lc" readonly="">                     
                  </div>
              </div>
               
            <div class="col-md-4" style="display:none">
                <div class="form-group">
                  <label>LC Issuing Bank</label>
                  <input type="text" name="lc_bank" placeholder="LC Bank"  class="form-control"  id="lc_bank">
                </div>
            </div>
            <div class="col-md-4" style="display:none">
                <div class="form-group">
                  <label>LC Amount</label>
                  <input type="text" name="lc_amount" placeholder="LC Amount"  class="form-control"  name="lc_amount">
                </div>
            </div>
            <div class="col-md-4" style="display:none">
            <div class="form-group">
              <label>LC Date</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                </div>
                <input type="text" onfocus="this.type='date'" onfocusout="this.type='text'" value="2021-10-12" id="lc_date" class="form-control" name="lc_date">
              </div>
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
               <input type="hidden" name="hidden_instock" class="form-control" required="true" id="hidden_instock">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Unit</label>
              <select class="form-control select2" style="width: 100%;height:30px" name="size" required="" id="size">
                <option value="">Select Unit</option>
                <option value="PCS">PCS</option>
                <option value="BOX">BOX</option>
                <option value="KG">KG</option>
                <option value="GM">GM</option>
                <option value="ML">ML</option>
              </select>
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
              <label>Purchase Unit Price</label>
              <input type="text" name="cost_price" placeholder="0.00" id="unit_price" class="form-control" required="true" onkeyup="calculate.call(this);">
            </div>
          </div>
           <div class="col-md-4">
            <div class="form-group">
              <label>Profit (%)</label>
              <input type="text" name="pp" placeholder="0.00" id="pp" class="form-control" required="true" readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Sale Unit Price</label>
              <input type="text" name="sale_price" placeholder="0.00"  value="0.00" id="sale_price" class="form-control" required="true" >
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Expire Date</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                </div>
                <input type="text" onfocus="this.type='date'" onfocusout="this.type='text'" value="2021-10-12" id="expire_date" class="form-control" name="expire_date">
              </div>
            </div>
          </div>
           <div class="col-md-4">
            <div class="form-group">
              <label>Emergency Stock</label>
              <input type="text" id="low_stock" name="low_stock" placeholder="0.00" class="form-control" >
            </div>
          </div> 
          <div class="col-md-4">
            <div class="form-group">
              <label>Total Price</label>
              <input type="text" name="total_price" placeholder="0.00" class="form-control" id="total_price" required="true" readonly="">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Instock</label>
              <input type="text" id="inst" name="instock" placeholder="0.00" class="form-control" required="true" readonly="">
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
                  <th class="text-center">Unit</th>
                  <th class="text-center">Qty</th>
                  <th class="text-center">Unit Price</th>
                  <th class="text-center">Sale Price</th>
                  <th class="text-center">Total Price</th>
                  <th class="text-center">Instock</th>
                  <th class="text-center">Expire Date</th>
                  <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                                      </tbody>  
                <tfoot>
                  <tr>
                    <td colspan="6"><b style="color:#05731eed">Total</b></td>
                    <td ><input type="text" readonly="true" name="total_amount" value="0" id="total_amount" placeholder="0.00" style="width:100px;background: #ececec;padding-left: 5px;height: 30px;text-align: center;;font-weight: bold;font-size: 18px"></td>
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
                  <tr style="display:none">
                    <td>
                      <div class="form-group">
                        <label>Chalan No.</label>
                        <input type="text" name="chalan_no" placeholder="xxx" class="form-control" style="border-radius: 0px"  >
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="form-group">
                        <label>Vat</label>
                        <input type="text" name="vat" placeholder="0.00"  id="vat" class="form-control" onkeyup="finalCalculator()" style="border-radius: 0px">
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="form-group">
                        <label>Transport/Labour</label>
                        <input type="text" name="transport" placeholder="0.00"  id="transport" class="form-control" onkeyup="finalCalculator()" style="border-radius: 0px">
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="form-group">
                        <label>Discount</label>
                        <input type="text" name="discount" placeholder="0.00"  id="discount" class="form-control" onkeyup="finalCalculator()" style="border-radius: 0px">
                      </div>
                    </td>
                  </tr>
                  <tr >
                    <td>
                      <div class="form-group">
                        <label>Cash Paid</label>
                        <input type="text" name="cash_paid" placeholder="0.00" id="cash_paid" class="form-control" onkeyup="finalCalculator()" style="border-radius: 0px;font-weight: bold;font-size: 18px">
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
                      <div class="form-group">
                        <label>Payment Method</label>
                          <select class="form-control select2" style="width: 100%;height:30px" name="payment_method" id="payment_method" required="">
                            <option value="">Select..</option>
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
                        <select class="form-control select2" style="width: 100%;height:30px" name="bank_id" >
                            <option value="">Select Bank</option>
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
        <div class="card-footer" >
          <button type="button" onclick="this.type='submit'" class="btn btn-success">Submit</button>

          <button type="reset" class="btn btn-danger">Clear</button>
        </div>
      </form>
   </div>
</div>
<script type="text/javascript">

$(document).ready(function(){
$('#name').focus();
      $('#supplier').on('change',function(){
        var supplier = $(this).val();
        $.ajax({
           type:'get',
           url : "{{url('editor/supplier/payment-info')}}",
           data:{supplier:supplier},             
           success:function(res){
            if(res){
                $('#previous_balance').val(res.supplier_due);
                $('#name').focus();
             }else{
               $('#previous_balance').empty();
             }
            }
    });
    });
    $('#pp').on('keyup',function(){
        var unit_price = parseFloat($("#unit_price").val()) || 0;
        var pp = parseFloat($("#pp").val()) || 0;
        var sp = (unit_price * pp) / 100;
        var sale = unit_price + sp;
        $("#sale_price").val(sale);
        
    });
    $('#sale_price').on('keyup',function(){
        var unit_price = parseFloat($("#unit_price").val()) || 0;
        var sale_price = parseFloat($("#sale_price").val()) || 0;
        var price = sale_price - unit_price;
        var pp = ( price * 100) / unit_price;
        $("#pp").val(pp.toFixed(2));
        
    });
      $('#po').on('change',function(){
        $("#product_id").empty();
        var po = $(this).val();
        $.ajax({
           type:'GET',
           url : "{{url('editor/purchase-product/info')}}",
           data:{po:po}, 
           dataType : 'json',            
           success:function(res){
            if(res){
              $("#product_id").append('<option value="">Select Item</option>');
              $("#product_id").val(null).trigger('change');
                  $.each(res,function(index,val){
                      $("#product_id").append('<option value="'+index+'">'+val+'</option>');
                  });
             }
             else{
              $("#supplier").empty();
             }
          }
      });

        $.ajax({
             type:'GET',
             url : "{{url('editor/purchase/local-cost')}}",
             data:{gw_po:po},            
             dataType : 'json',    
             success:function(res){
                $("#lc").val(res.lc_no);
             }
      });
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
   $("#product_id").on('change',function(){
    var name = $(this).val();   
    checkAllName(name);
    var po = $("#po").val();   
      if(name !=''){
          $.ajax({
              method:"GET",
              url:"{{url('editor/purchse/import-info')}}",
              data:{product_id:name,po:po},
              success:function(res){ 
                  var stock = res.product.stock;          
                  var price = res.sale_price;
                  var cost = res.cost_price;
                  var qty = res.quantity;
                  var margin = res.margin;
                  var low_stock = res.product.stock_alert;
                  var size = res.size;
                 $('#inst').val(parseFloat(stock));
                 $('#hidden_instock').val(parseFloat(stock));
                 $('#unit_price').val(parseFloat(cost));
                 $('#sale_price').val(parseFloat(price));
                 
                 $("#size").val(size).trigger('change');
                 $("#qty").val(qty);
                 $("#pp").val(margin);
                 $("#low_stock").val(low_stock);
                 calculate();
              }              
          });
      }
     // $('#namelist').fadeOut();
  });
});
function checkAllName($name){
  $('#namelist').fadeOut();
 var now = $name;
 $('#example2 tbody tr').each(function ()
    {
      $(this).find('.pro_id').each (function() {
        var pro_name = $(this).val();
        if(pro_name == now){
          alert('This Name Already in List');
          // $(this).css('background','#f1967a');
          return false;
        }
      })
    }
  );
}

function AddData() {
   
    $('#add').attr('disabled',true);
    var size = $("#size").val();
    var unit_price = document.getElementById("unit_price").value;
    var qty = document.getElementById("qty").value;   
    var sale_price = document.getElementById("sale_price").value;
    var total_price = document.getElementById("total_price").value;
    var instock = document.getElementById("inst").value;
    var expire_date = document.getElementById("expire_date").value;
    var product_id = document.getElementById("product_id").value;
    var low_stock = document.getElementById("low_stock").value;
   
    if(product_id == ''){
        alert('Name Cant be Empty');
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
      cols += '<td><select class="form-control select2 pro_id" style="width: 100%;height:30px;background-color:none" name="product_id[]" >@foreach($products as $key=>$value) <option value="{{$value->id}}">{{$value->pro_name}} </option> @endforeach </select></td>';
      cols += '<td><input type="text" name="size[]" placeholder="Enter Size" class="form-control size"   value="'+size+'" style="background:none;border-radius:0px"><input type="hidden" name="low_stock[]" placeholder="Enter Size" class="form-control low_stock"   value="'+low_stock+'" style="background:none;border-radius:0px"></td>';
      cols += '<td><input type="text" name="quantity[]" class="form-control qty" readonly="true" value="'+qty+'" style="background:none;border-radius:0px" onkeyup="calculator.call(this)" required="true"/><input type="hidden"  class="form-control hide_qty" name="hidden_qty" readonly="true" value="'+qty+'" style="background:none;border-radius:0px"/></td>';
      cols += '<td><input type="text" name="cost_price[]" class="form-control up" readonly="true" value="'+unit_price+'" style="background:none;border-radius:0px" onkeyup="calculator.call(this)" required="true"/></td>';
      cols += '<td><input type="text" name="sale_price[]" class="form-control sp" readonly="true" value="'+sale_price+'" style="background:none;border-radius:0px" required="true"/></td>';
      cols += '<td><input type="text" name="total_price[]" class="form-control tp" readonly="true" value="'+total_price+'" style="background:none;border-radius:0px"/></td>';
     
      cols += '<td><input type="text" name="instock[]" class="form-control stock" readonly="true" value="'+instock+'" style="background:none;border-radius:0px"/><input type="hidden"  class="form-control hide_stock" name="hidden_instock[]" readonly="true" value="'+instock+'" style="background:none;border-radius:0px"/></td>';
      cols += '<td><input type="text" name="expire_date[]" class="form-control date" readonly="true" value="'+expire_date+'" style="background:none;border-radius:0px"/></td>';
      cols += '<td><a id="remCF" class="btn btn-sm ibtnUp"><i class="fa fa-pencil" style="color:#green"></i>Edit</a> <a id="remCF" class="btn btn-sm ibtnDo" style="display:none;color:#fff" > <i class="fa fa-check" ></i></a> <a id="remCF" class="btn btn-sm ibtnDel"><i class="fa fa-trash" style="color:red"></i></a></td>';
       
      newRow.append(cols);  
           
      $("#example2 tbody").append(newRow);
      $(" .pro_id:last > option").each(function() {
         var ct = this.value;
         if(ct == product_id){
           $(this).attr('selected', 'selected');
         } 
        });

     $('.select2').select2();
  //    save_float();     
      sl();   
      ResetForm();
      $('#hidden_instock').val('0.00');
      AccountCalculation();
      $('#name').focus();
     }
}

function sl(){
  $('table#example2  tr').not(':first').not(':last').each(function($id){
  $(this).children().first().html($id + parseFloat(0));
})
}

function AccountCalculation(){
    var sum = 0;
    var total = 0;
    $row = $('#example2 > tbody  > tr');
      $row.find('.tp').each (function() {
        sum += parseFloat($(this).val());
      })  
    $('#total_amount').val(sum.toFixed(2));
    $('#due').val(sum.toFixed(2));
}
function calculator(){
  $row = $(this).closest("tr");
  var oldqty = parseFloat($row.find('.hide_qty').val());
  var qty = parseFloat($row.find('.qty').val());
  var price = parseFloat($row.find('.up').val());
  var hide_stock = parseFloat($row.find('.hide_stock').val());
   if(isNaN(qty))
    qty = 0;
  if(isNaN(qty))
    price = 0;
  var aqty = qty - oldqty;
  var total = qty * price;
  var stck = hide_stock + aqty;
  if(isNaN(total)){
    total = 0;
  }
  if(isNaN(stck)){
    stck = 0;
  }
  $row.find('.tp').val(total.toFixed(2));
  $row.find('.stock').val(stck);
  AccountCalculation()
}
function finalCalculator(){
 var total_amount = parseFloat($('#total_amount').val()) || 0;
 var vat = parseFloat($('#vat').val()) || 0;
 var transport = parseFloat($('#transport').val()) || 0;
 var discount = parseFloat($('#discount').val())  || 0;
 var cash_paid = parseFloat($('#cash_paid').val())  || 0;

 var vat_amount = (total_amount * vat) / 100;
 var due = total_amount + vat_amount + transport - discount - cash_paid;
 $('#due').val(Math.round(due));
}
function ResetForm() {
    document.getElementById("product_form").reset();
    $("#size").val(null).trigger('change');
    $("#product_id").val(null).trigger('change');
    $('#add').attr('disabled',false);
}
function calculate() {
    var qty = parseFloat($("#qty").val()) || 0;
    var unit_price = parseFloat($("#unit_price").val()) || 0;
    var hidden_instock = parseFloat($("#hidden_instock").val()) || 0;
    
    var stock = hidden_instock + qty;
    var total_price = unit_price * qty;
    $('#inst').val(stock);
    $('#total_price').val(total_price.toFixed(2));
    
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
  $row.find('.up').removeAttr('readonly');
  $row.find('.sp').removeAttr('readonly');
  $row.find('.qty').css('background','#fff');
  $row.find('.sp').css('background','#fff');
  $row.find('.up').css('background','#fff');
});
$("table#example2").on("click", ".ibtnDo", function (event) {
  $row = $(this).closest("tr");
  $(this).hide(); 
  $row.find('.ibtnUp').show();
  $row.find('.qty').attr('readonly',true);
  $row.find('.up').attr('readonly',true);
  $row.find('.sp').attr('readonly',true);
  $row.find('.qty').css('background','none');
  $row.find('.sp').css('background','none');
  $row.find('.up').css('background','none');

});

</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#add_form').on('submit',function(e){
        if($("#supplier").val() == ''){alert("Supplier Cant be Empty");return false;}
       var dataString = $("#add_form, #cusSupForm").serialize();
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
       });
      $.ajax({
             type:'post',
             url : "{{url('editor/purchase/save')}}",
             data:dataString,            
             success:function(res){
                if(res.status==='success'){
                   toastr.success('Success!!','Data save successfully');
                }else{
                  toastr.error('Opps!!','Data save failed');
                }
                setTimeout(function(){
                   location.reload();
                },50);
             }
      });
       e.preventDefault();
    });
  });
</script>
<script type="text/javascript">
    $(document).ready(function(){
    $('#po_number').on('change',function(){
        var id = $(this).val();
          $.ajax({
               type:"GET",
               url:"{{url('editor/purchse/lcost-info')}}?id="+id,
               success:function(res){               
                if(res){
                    console.log(res);
                    $("#lc_number").empty();
                     $("#lc_number").val(res.lc_number);
                }else{
                   $("#supplier").empty();
                }
               }
            });
       });
    });
</script>
@endsection
