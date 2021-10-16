@extends('backEnd.layouts.master') 
@section('title','Local Cost Add') 
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <div class="page-title">
                    <h6>Local Cost Add</h6>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="short-icon text-right">
                    <a href="{{url('editor/localcost/manage')}}" class="btn btn-primary"><i class="fa fa-eye"></i> Manage</a>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="card">
    <div class="card-body">
        <!-- form start -->
    <form id="cusSupForm">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
               <label></label>
                <input type="text" onfocus="this.type='date'" onfocusout="this.type='text'" value="{{date('Y-m-d')}}" id="date" class="form-control" name="receive_date" placeholder="Date">
              </div>
          </div>  
           <div class="col-md-4">
            <div class="form-group">
              <label></label>
              <select name="cost_type" class="form-control select2" id="type_id">
                <option value="">Select Type</option>
                <option value="1">Local</option>
                <option value="2">Foreign</option>
              </select>
            </div>  
            </div>

            <div class="col-md-4">
            <div class="form-group">
              <label></label>
              <select class="form-control select2" style="width: 100%;height:30px" name="supplier_id" required="" id="supplier_id">
                <option value="">Select Exporter</option>
              </select>
            </div>
            </div>
          <div class="col-md-4 foreign">
            <div class="form-group">
              <label></label>
               <select name="cf_agent" class="form-control select2" id="cf_name" required="true">
                <option value="" selected="selected">Select C&F Agent</option>
                @foreach($cfagents as $key=>$value)
                <option value="{{$value->id}}">{{$value->cf_name}}</option>
                @endforeach
                </select>
            </div>
          </div>  
          <div class="col-md-4 foreign">
            <div class="form-group">
              <label></label>
              <input type="text" name="shipping_port" placeholder="Shipping Port" id="cf_phn" class="form-control"  autocomplete="off">
            </div>
          </div>  
          <div class="col-md-4 foreign">
            <div class="form-group">
              <label></label>
               <select name="destination_id" class="form-control select2" id="port">
               @foreach($destination as $key=>$value)
                <option value="{{$value->id}}">{{$value->destination_name}}</option>
                @endforeach
              </select>
            </div>
          </div> 
          <div class="col-md-4 foreign">
            <div class="form-group">
              <label></label>
              <input type="text" name="lc_number"  class="form-control" placeholder="LC Number">
              </div>
          </div>
          <div class="col-md-4 foreign">
            <div class="form-group">
              <label></label>
              <input type="text" name="lc_date" id="lc_date" class="form-control" placeholder="LC Date" value="{{date('Y-m-d')}}" autocomplete="off" onfocus="this.type='date'" onfocusout="this.type='text'">
            </div>
          </div>
          <div class="col-md-4 foreign">
            <div class="form-group">
              <label></label>
              <input type="text" name="lc_amount" placeholder="LC Amount (USD)" id="lc_amount" class="form-control"  autocomplete="off">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label></label>
              <select name="bank_id" class="form-control select2" id="bank_name" style="width: 100%;height:30px">
                <option value="" selected="selected">Select Bank</option>
                  @foreach($banks as $key=>$value)
                     <option value="{{$value->id}}">{{$value->bank_name}}</option>
                 @endforeach
                </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label></label>
              <input type="text" name="container_receive" placeholder="Container Received by" id="rcv_by" class="form-control"  autocomplete="off">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label></label>
              <input type="text" name="gw_po" placeholder="Purchase Order No" id="po" class="form-control" value="{{$gw_po}}" autocomplete="off" readonly>
            </div>
          </div> 
          <div class="col-md-4">
            <div class="form-group">
              <label></label>
              <input type="text" name="supplier_invoice" placeholder="Supplier Invoice No" id="sin" class="form-control"   autocomplete="off">
            </div>
          </div> 
        </div>
      </form>
      <h3 style="text-align: center;">Head Cost Entry</h3>
      <form id="product_form">  
        <div class="row">   
          
          <div class="col-md-4">
            <div class="form-group">
              <label>Head Name</label>
              <select class="form-control select2" style="width: 100%;height:30px" name="head_id"  id="head_id" autocomplete="off">
                <option value="">Select Head</option>
                @foreach($lcosthead as $key=>$value)
                <option value="{{$value->id}}">{{$value->local_cost_head}}</option>
                @endforeach
              </select>
            </div>
          </div>        

          <div class="col-md-4">
            <div class="form-group">
              <label>Amount</label>
              <input type="number" name="paid" placeholder="0.00" id="paid" class="form-control"  autocomplete="off">
            </div>
          </div> 

          <div class="col-md-4">
            <div class="form-group">
              <label>Comment</label>
              <input type="text" name="comment" placeholder="Enter Comment" id="comment" class="form-control"  autocomplete="off">
            </div>
          </div> 

        </div>
      </form>

      
       <br>
        <form method="POST" id="add_form">
        <div class="row">
          <div class="col-md-12">
            <div id="table-div">
              <table id="firstTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="text-center">*</th>
                  <th class="text-center">Head Name</th>
                  <th class="text-center">Amount</th>
                  <th class="text-center">Comment</th>
                  <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                  
                </tbody>  
              </table>       
            </div>
          </div>
          
          
        </div>
        <div class="card-footer" style="text-align: center;margin-bottom: 10px;">
          <button type="reset" class="btn btn-danger">Reset</button>
          <button type="button" onclick="this.type='submit'" class="btn btn-info">Submit</button>
        </div>
      </form>
    </div>
</div>
<script type="text/javascript">
 
function AddData() {
   
    $('#add').attr('disabled',true);
    var customer_id = $("#head_id").val();
    var paid = $("#paid").val();
    var comment = $("#comment").val();
    
    if(customer_id == ''){
       alert('Client Cant be Empty');
       return false;
    }
    else if(paid == ''){
       alert('Amount Cant be Empty');
       return false;
    } 
    else {

        var rows = "";
        var newRow = $("<tr>");
        var cols = "";
        var i = 0;
      cols += '<td style="text-align: center;"></td>';

      cols += '<td><select class="form-control select2 head" style="width: 100%;height:30px;background-color:none" name="head_id[]" >@foreach($lcosthead as $key=>$value)<option value="{{$value->id}}">{{$value->local_cost_head}}</option>@endforeach </select></td>';
      cols += '<td><input type="text" name="amount[]" class="form-control paid"  readonly="true" value="'+paid+'" style="background:none;border-radius:0px"  required="true"/></td>';
      cols += '<td><input type="text" name="comment[]" class="form-control comment"  readonly="true" value="'+comment+'" style="background:none;border-radius:0px"  required="true"/></td>';
      cols += '<td> <a id="remCF" class="btn btn-sm ibtnDel"><i class="fa fa-trash" style="color:red"></i></a></td>';
      newRow.append(cols);  
      $("#firstTable tbody").append(newRow);
      $(" .head:last > option").each(function() {
         var sup = this.value;
         if(sup == customer_id){
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
    $("#head_id").val(null).trigger('change');
    $('#add').attr('disabled',false);
}
$("table#firstTable").on("click", ".ibtnDel", function (event) {
  $(this).closest("tr").remove(); 
  sl();
});
</script>
<script type="text/javascript">
  $(document).ready(function(){
   $('#product_form').on('keypress',function(e){
      if(e.which == 13) {
          AddData();    
      }
    });
    $('#type_id').on('change',function(){
        $("#supplier_id").empty();
        var type_id = $(this).val();
         $.ajax({
               type:"GET",
               url:"{{url('editor/supplier/find')}}?supplier_type="+type_id,
               success:function(res){               
                if(res){
                    $("#supplier_id").empty();
                     $("#supplier_id").append('<option value="0">Select...</option>');
                    $.each(res,function(key,value){
                        $("#supplier_id").append('<option value="'+key+'" class="supplier">'+value+'</option>');
                    });
               
                }else{
                   $("#supplier").empty();
                }
               }
            });
        if(type_id == '1')
          $('.foreign').hide();
        else
          $('.foreign').show();
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
             url : "{{url('/editor/localcost/save')}}",
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
@endsection
