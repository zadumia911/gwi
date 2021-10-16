@extends('backEnd.layouts.master') 
@section('title','Import Add') 
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <div class="page-title">
                    <h6>Import Add</h6>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="short-icon text-right">
                    <a href="{{url('editor/import/manage')}}" class="btn btn-primary"><i class="fa fa-eye"></i> Manage</a>
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
                    <input type="text" onfocus="this.type='date'" onfocusout="this.type='text'" value="{{date('Y-m-d')}}" id="date" class="form-control myDate" name="import_date">
                  </div>
                </div>
              </div> 
              <div class="col-md-4">
                <div class="form-group">
                  <label>PO Number</label>
                   <select name="po_number" class="form-control" id="po">
                    <option value="">Select..</option>
                      @foreach($localcost as $value)
                      <option value="{{$value->gw_po}}">{{$value->gw_po}}</option>
                      @endforeach
                    </select>
                  </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>LC NO</label>
                  <input type="text" name="lc_no" placeholder="0.00" id="lc_no" class="form-control" value="" readonly="" autocomplete="off">
                </div>
              </div>
             
              <div class="col-md-4">
                <div class="form-group">
                  <label>USD Exchange rate</label>
                  <input type="text" name="usd_rate" placeholder="0.00" id="usd_rate" class="form-control" value=""  autocomplete="off">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>SGD Exchange rate</label>
                  <input type="text" name="sgd_rate" placeholder="0.00" id="sgd_rate" class="form-control" value=""  autocomplete="off">
                </div>
              </div>  
              <div class="col-md-4">
                <div class="form-group">
                  <label>Total Local Costing</label>
                  <input type="text" name="local_cost" placeholder="0.00" id="local_cost" class="form-control" readonly="" autocomplete="off">
                </div>
              </div> 
              <div class="col-md-4">
                <div class="form-group">
                  <label>Total Quantity (Pcs)</label>
                  <input type="text" name="total_quantity" placeholder="0.00" id="tq" class="form-control"  autocomplete="off">
                </div>
              </div>  

             </div>
          </form>
          <h3 style="text-align: center">Product Part</h3>
          <form id="product_form">  
            <div class="row">   
              
              <div class="col-md-3">
                <div class="form-group">
                  <label>HS Code</label>
                  <input type="text" name="hs_code" placeholder="0.00" id="hs" class="form-control"  autocomplete="off">
                </div>
              </div> 
              <div class="col-md-3">
                <div class="form-group">
                  <label>Product Name</label>
                  <select class="form-control select2" style="width: 100%;height:30px"  id="item_id" autocomplete="off">
                    <option value="">Select Product</option>
                     @foreach($product as $key=>$value)
                     <option value="{{$value->id}}">{{$value->pro_name}}</option>
                     @endforeach            
                    </select>
                </div>
              </div>        
              <div class="col-md-3">
                <div class="form-group">
                  <label>Pack</label>
                  <input type="number"  placeholder="0.00" id="pack" class="form-control"  autocomplete="off">
                </div>
              </div> 
              <div class="col-md-3">
                <div class="form-group">
                  <label>Size</label>
                  <input type="number" placeholder="0.00" id="size" class="form-control"  autocomplete="off">
                </div>
              </div> 
              <div class="col-md-3">
                <div class="form-group">
                  <label>Unit</label>
                  
                   <select class="form-control select2" style="width: 100%;height:30px"  required="" id="unit">
                    <option value="">Select Unit</option>
                    <option value="PCS">PCS</option>
                    <option value="BOX">BOX</option>
                    <option value="KG">KG</option>
                    <option value="GM">GM</option>
                    <option value="ML">ML</option>
                  </select>
                </div>
              </div> 

              <div class="col-md-3">
                <div class="form-group">
                  <label>Qty Cartoon</label>
                  <input type="number"  placeholder="0.00" id="cartoon" class="form-control"  autocomplete="off">
                </div>
              </div> 

              <div class="col-md-3">
                <div class="form-group">
                  <label>Pcs</label>
                  <input type="text"  placeholder="0.00" id="pcs" class="form-control" readonly="" autocomplete="off">
                </div>
              </div> 
              <div class="col-md-3">
                <div class="form-group">
                  <label>Net Weight</label>
                  <input type="text"  placeholder="0.00" id="net_weight" class="form-control" readonly="" autocomplete="off">
                </div>
              </div> 
              <div class="col-md-3">
                <div class="form-group">
                  <label>Currency</label>
                  <select class="form-control select2" id="currency">
                    <option value="">Select Currency</option>
                    <option value="Tk">Tk</option>
                    <option value="USD">USD</option>
                    <option value="SGD">SGD</option>
                  </select>  
                  </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Purchase Price Pcs</label>
                  <input type="text"  placeholder="0.00" id="ppp" class="form-control"  autocomplete="off">
                </div>
              </div> 
              <div class="col-md-3">
                <div class="form-group">
                  <label>Purchase Price Cartoon</label>
                  <input type="text"  placeholder="0.00" id="ppc" class="form-control" readonly="" autocomplete="off" readonly>
                </div>
              </div> 
              <div class="col-md-3">
                <div class="form-group">
                  <label>Total Value</label>
                  <input type="text"  placeholder="0.00" id="total_value" class="form-control" readonly="" autocomplete="off" readonly>
                </div>
              </div> 
              <div class="col-md-3">
                <div class="form-group">
                  <label>Purchase Price Pcs (TK)</label>
                  <input type="text"  placeholder="0.00" id="ppp_tk" class="form-control" readonly="" autocomplete="off">
                </div>
              </div> 
              <div class="col-md-3">
                <div class="form-group">
                  <label>Duty Assignment KG USD</label>
                  <input type="text"  placeholder="0.00" id="duty_assign" class="form-control"  autocomplete="off" >
                </div>
              </div> 
               <div class="col-md-3">
                <div class="form-group">
                  <label>Duty %</label>
                  <input type="text"  placeholder="0.00" id="duty_p" class="form-control"  autocomplete="off" >
                </div>
              </div> 
              <div class="col-md-3">
                <div class="form-group">
                  <label>Total Duty Per Item</label>
                  <input type="text"  placeholder="0.00" id="duty_item" readonly="" class="form-control"  autocomplete="off" readonly>
                </div>
              </div> 
              <div class="col-md-3">
                <div class="form-group">
                  <label>Duty Per Pcs</label>
                  <input type="text"  placeholder="0.00" id="duty_item_pc" readonly="" class="form-control"  autocomplete="off" readonly>
                </div>
              </div> 
               <div class="col-md-3">
                <div class="form-group">
                  <label>Local Cost Per Pcs</label>
                  <input type="text"  placeholder="0.00" id="local_cost_price" readonly="" class="form-control"  autocomplete="off" readonly>
                </div>
              </div>
               <div class="col-md-3">
                <div class="form-group">
                  <label> Cost Per Pcs</label>
                  <input type="text"  placeholder="0.00" id="cost_price" class="form-control"  readonly="" autocomplete="off" readonly>
                </div>
              </div> 
              <div class="col-md-3">
                <div class="form-group">
                  <label> Total Cost</label>
                  <input type="text"  placeholder="0.00" id="total_cost_price" class="form-control"  readonly="" autocomplete="off" readonly>
                </div>
              </div> 
              <div class="col-md-3">
                <div class="form-group">
                  <label>Profit Margin (%)</label>
                  <input type="text"  placeholder="0.00" id="margin" class="form-control"  autocomplete="off" >
                </div>
              </div> 
               <div class="col-md-3">
                <div class="form-group">
                  <label>Sale Price</label>
                  <input type="text"  placeholder="0.00" id="sale_price" class="form-control"  autocomplete="off" >
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Total Sale Price</label>
                  <input type="text"  placeholder="0.00" id="total_sale_price" class="form-control" readonly="" autocomplete="off" readonly>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Total Gross Profit</label>
                  <input type="text"  placeholder="0.00" id="gross" class="form-control"  autocomplete="off" readonly>
                </div>
              </div> 
            </div>
          </form>
          <a class="btn btn-primary" id="add">Add List</a>
            <form method="POST" id="add_form" class="my-2">
            <div class="row">
              <div class="col-md-12">
                <div id="table-div">
                  <table id="firstTable" class="table table-bordered table-striped">
                    <thead class="bg-primary">
                    <tr>
                      <th class="text-center">*</th>
                      <th class="text-center">Hs Code</th>
                      <th class="text-center">Item Name</th>
                      <th class="text-center">Cartoon</th>
                      <th class="text-center">Currency</th>
                      <th class="text-center">Purchase Price</th>
                      <th class="text-center">Profit Margin</th>
                      <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>  
                  </table>       
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="button" onclick="this.type='submit'" class="btn btn-success">Submit</button>
            </div>
          </form>
    </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
   $('#product_form').on('keypress',function(e){
      if(e.which == 13) {
          AddData();    
      }
    });
    $("#item_id").on('change',function(){
    var now= $(this).val();
   // alert(now);
     $(this).find('.cat').each(function() {
        var pro_name = $(this).val();
        if(pro_name == now){
          alert('This Name Already in List');
          return false;
        }
      }) 
    });
     $('#add').on('click',function(e){
        AddData();
  });
   $('#po').on('change',function(e){
      var id = $(this).val();
      $.ajax({
             type:'get',
             url:"{{url('editor/lcost-info')}}?id="+id,          
             success:function(res){
              var data = res;
                $("#local_cost").val(res.lc_cost);
                $("#lc_no").val(res.lc_no);
             }
      });
    });
    $('#sale_price').on('keyup',function(){
        var pcs = $('#tq').val();
        var sale_price = parseFloat($(this).val()) || 0;
        var cost_price = parseFloat($('#cost_price').val()) || 0;
        var total_cost_price = parseFloat($('#total_cost_price').val()) || 0;
        var price = sale_price - cost_price;
        var margin = ( price * 100) / cost_price;
        $("#margin").val(margin.toFixed(2));

      var profit = (cost_price * margin) / 100;      
      var total_sale_price = pcs * sale_price;
      var gross = total_sale_price - total_cost_price;
    //  $("#sale_price").val(sale_price.toFixed(2));
      $("#total_sale_price").val(total_sale_price.toFixed(2));
      $("#gross").val(gross.toFixed(2));
        
    });
   $('#cartoon').on('keyup',function(e){
      var cartoon = $('#cartoon').val();
      var pack = $('#pack').val();
      var size = $('#size').val();
      var net_weight = $('#net_weight').val();
      var net_weight = cartoon * pack * size;
      var pcs = cartoon * pack;
      $("#pcs").val(pcs);
      $("#net_weight").val(net_weight);
    });
   $('#ppp').on('keyup',function(e){
      var pack = $('#pack').val();
      var currency = $('#currency').val();
      var pcs = $('#pcs').val();
      var ppp = $('#ppp').val();
      var ppc = ppp * pack;     
      var total_value = ppp * pcs;     
      $("#ppc").val(ppc.toFixed(2));
      $("#total_value").val(total_value);
      if(currency == 'SGD'){
        var ppp_tk = $("#sgd_rate").val() * ppp;
        $("#ppp_tk").val(ppp_tk);
      }else if(currency == 'USD'){
        var ppp_tk = $("#usd_rate").val() * ppp;
        $("#ppp_tk").val(ppp_tk);
      }else if(currency == 'Tk'){
      //  alert(ppp);
        $("#ppp_tk").val(ppp);
      }
    });
   $('#duty_p').on('keyup',function(e){
      var pcs = parseInt($('#tq').val()) || 1;
      var ppp_tk = $('#ppp_tk').val();
      var duty_p = $('#duty_p').val();
      var duty_assign = $('#duty_assign').val();
      var net_weight = $('#net_weight').val();   
      var usd_rate = $('#usd_rate').val();   
      var dpcs = $('#pcs').val();
      var duty_item = (net_weight * duty_assign * duty_p * usd_rate) / 100;     
      var duty_item_pc = duty_item / dpcs;     
      var local_cost_price = $("#local_cost").val() / pcs;
     // alert(local_cost_price);
      var cost_price = parseFloat(local_cost_price) + parseFloat(duty_item_pc) + parseFloat(ppp_tk);
      var total_cost_price = dpcs * cost_price;
      $("#duty_item").val(duty_item.toFixed(2));
      $("#duty_item_pc").val(duty_item_pc.toFixed(2));
      $("#local_cost_price").val(local_cost_price.toFixed(2));
      $("#cost_price").val(cost_price.toFixed(2));
      $("#total_cost_price").val(total_cost_price.toFixed(2));
    });
   $('#margin').on('keyup',function(e){
      var pcs = $('#pcs').val();
      var margin = $('#margin').val();
      var cost_price = $('#cost_price').val();
      var total_cost_price = $('#total_cost_price').val();
      var profit = (cost_price * margin) / 100;
      var sale_price = parseFloat(cost_price) + parseFloat(profit.toFixed(2));      
      var total_sale_price = pcs * sale_price;
      var gross = total_sale_price - total_cost_price;
      $("#sale_price").val(sale_price.toFixed(2));
      $("#total_sale_price").val(total_sale_price.toFixed(2));
      $("#gross").val(gross.toFixed(2));
    });
   
    $('#add_form').on('submit',function(e){
       var dataString = $("#add_form , #cusSupForm").serialize();
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
             type:'post',
             url : "{{url('editor/import/save')}}",
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



function AddData() {
   
    $('#add').attr('disabled',true);
    var hs = $("#hs").val();
    var item_id = $("#item_id").val();
    var cartoon = $("#cartoon").val();
    var pcs = $("#pcs").val();
    var currency = $("#currency").val();
    var ppp = $("#ppp").val();
    var margin = $("#margin").val();
    var duty_assign = $("#duty_assign").val();
    var duty_p = $("#duty_p").val();
    var pack = $("#pack").val();
    var size = $("#size").val();
    var cost_price = $("#cost_price").val();
    var sale_price = $("#sale_price").val();
    var quantity = $("#pcs").val();
    
    if(item_id == ''){
       alert('Item Cant be Empty');
       return false;
    }
    else if(cartoon == ''){
       alert('Cartoon Cant be Empty');
       return false;
    } 
    else {

        var rows = "";
        var newRow = $("<tr>");
        var cols = "";
        var i = 0;
      cols += '<td style="text-align: center;"></td>';

      cols += '<td><input type="text" name="hs[]" class="form-control hs"  readonly="true" value="'+hs+'" style="background:none;border-radius:0px"  required="true"/><input type="hidden" name="item_id[]" class="form-control item_id"  readonly="true" value="'+item_id+'" style="background:none;border-radius:0px"  required="true"/><input type="hidden" name="duty_assign[]" class="form-control duty_assign"  readonly="true" value="'+duty_assign+'" style="background:none;border-radius:0px"  required="true"/><input type="hidden" name="duty_p[]" class="form-control duty_p"  readonly="true" value="'+duty_p+'" style="background:none;border-radius:0px"  required="true"/><input type="hidden" name="cost_price[]" class="form-control cost_price"  readonly="true" value="'+cost_price+'" style="background:none;border-radius:0px"  required="true"/><input type="hidden" name="sale_price[]" class="form-control sale_price"  readonly="true" value="'+sale_price+'" style="background:none;border-radius:0px"  required="true"/><input type="hidden" name="quantity[]" class="form-control quantity"  readonly="true" value="'+quantity+'" style="background:none;border-radius:0px"  required="true"/></td>';
      cols += '<td><select class="form-control select2 cat" style="width: 100%;height:30px" autocomplete="off"> <option value="">Select Name</option> @foreach($product as $value) <option value="{{$value->id}}">{{$value->pro_name}}</option> @endforeach</select></td>';
      cols += '<td><input type="text" name="cartoon[]" class="form-control cartoon"  readonly="true" value="'+cartoon+'" style="background:none;border-radius:0px"  required="true"/></td>';
      cols += '<td><input type="text" name="currency[]" class="form-control currency"  readonly="true" value="'+currency+'" style="background:none;border-radius:0px"  required="true"/><input type="hidden" name="pack[]" class="form-control pack"  readonly="true" value="'+pack+'" style="background:none;border-radius:0px"  required="true"/><input type="hidden" name="size[]" class="form-control size"  readonly="true" value="'+size+'" style="background:none;border-radius:0px"  required="true"/></td>';
      cols += '<td><input type="text" name="ppp[]" class="form-control ppp"  readonly="true" value="'+ppp+'" style="background:none;border-radius:0px"  required="true"/></td>';
      cols += '<td><input type="text" name="margin[]" class="form-control margin"  readonly="true" value="'+margin+'" style="background:none;border-radius:0px"  required="true"/></td>';
      cols += '<td> <a id="remCF" class="btn btn-sm ibtnDel"><i class="fa fa-trash" style="color:red"></i></a></td>';
       
      newRow.append(cols);  
           
      $("#firstTable tbody").append(newRow);
      $(" .cat:last > option").each(function() {
         var ct = this.value;
         if(ct == item_id){
           $(this).attr('selected', 'selected');
         } 
        });

      $('.select2').select2();   
      sl();   
      ResetForm();
      event.preventDefault();
     }
}


function sl(){
  $('table#firstTable  tr').not(':first').not(':last').each(function($id){
  $(this).children().first().html($id + parseInt(0));
})
}

function ResetForm() {
    document.getElementById("product_form").reset();
    $("#item_id").val(null).trigger('change');
    $("#currency").val(null).trigger('change');
    $('#add').attr('disabled',false);
}

$("table#firstTable").on("click", ".ibtnDel", function (event) {
  $(this).closest("tr").remove(); 
  sl();
});
</script>
@endsection
