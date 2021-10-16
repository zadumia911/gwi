@extends('backEnd.layouts.master') 
@section('title','Supplier Payment') 
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
               <div class="page-title">
                    <h6>Supplier Payment</h6>
              </div>
            </div>
            <div class="col-sm-6">
                <div class="short-icon text-right">
                    <a href="{{url('admin/supplier/payment/manage')}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="card">
    <!-- form start -->
    <form method="POST" action="{{url('admin/supplier/payment/save')}}">
     @csrf      
      <div class="row">
        <div class="card-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Supplier Name</label>
                <select class="form-control select2" name="supplier_id" id="supplier_id">
                    <option value="">Select Supplier</option>
                    @foreach($supplier as $value)
                      <option value="{{$value->id}}"> {{$value->supplier_name ,$value->supplier_address, $value->supplier_phone}}</option>
                    @endforeach
                </select>
              </div>                
            </div>
            <div class="col-md-4" style="display:none">
              <div class="form-group">
                <label>Bill No</label>
                <select class="form-control" name="invoice_number" id="invoice_number">
                 </select>
              </div>                
            </div>
            <div class="col-md-4" style="display: none">
              <div class="form-group">
                <label>Previous Balance</label>
                <input type="text" placeholder="0.00" readonly="" class="form-control" required="true" id="prev_bal" style="font-weight: bold;font-size: 18px">
              </div>                
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Previos Due</label>
                <input type="text" name="previous_balance" placeholder="0.00" readonly="" class="form-control" required="true" id="previous_balance"style="font-weight: bold;font-size: 18px">
              </div>                
            </div>
            <div class="col-md-4">
              <div class="form-group">
                 <label>Payment Method</label>
                  <select class="form-control select2"  name="payment_method" id="payment_method" required="">
                    <option value="">Select</option>
                    <option value="Cash">Cash</option>
                    <option value="Cheque">Cheque</option>
                    <option value="Bank">Bank</option>
                  </select>
              </div>                
            </div>
            <div class="col-md-4 bank bank_name">
              <div class="form-group">
                <label>Bank Name</label>
                  <select name="bank_id" class="form-control select2" id="bank_id" style="width: 100%;height:30px">
                  <option value="" selected="selected">Select Bank</option>
                     @foreach($banks as $value)
                    <option value="{{$value->id}}">{{$value->bank_name}}</option>
                    @endforeach
                  </select>
                </div>                
            </div> 

            <div class="col-md-4 bank_name" style="display: none">
              <div class="form-group">
                <label>Bank Amount</label>
                <input type="text" name="bank_amount" placeholder="0.00" id="bank_amn" class="form-control" style="border-radius: 0px;font-weight: bold;font-size: 18px">
              </div>               
            </div>

            <div class="col-md-4 bank">
              <div class="form-group">
                <label>Check Number</label>
                <input type="text" name="check_num" placeholder="xxx" id="check_num" class="form-control" style="border-radius: 0px">
              </div>                
            </div>  

           <div class="col-md-4 bank">
            <div class="form-group">
              <label>Check Amount</label>
              <input type="text" name="check_amount" placeholder="0.00" id="check_amn" class="form-control" style="border-radius: 0px;font-weight: bold;font-size: 18px">
            </div>               
          </div>

          <div class="col-md-4 bank">
            <div class="form-group">
              <label>Approve Date</label>
              <input type="date" name="check_appr_date" placeholder="xxx"  id="check_appr_date" class="form-control" style="border-radius: 0px">
            </div>              
          </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Cash Paid</label>
                <input type="text" name="paid" placeholder="Enter Amount" id="paid" class="form-control" required="true" style="font-weight: bold;font-size: 18px">
              </div>                
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Balance</label>
                <input type="text" name="balance" placeholder="0.00" readonly="" id="balance" class="form-control" required="true" style="font-weight: bold;font-size: 18px">
              </div>                
            </div>
            <!-- /.col -->
            <div class="col-md-4">
                <div class="form-group">
                   <label>Date</label>
                  <input type="text" name="date" value="2021-10-14" class="form-control" required="true" onfocus="this.type='date'" onfocusout="this.type='text'">
                </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" name="submit" class="btn btn-success">Submit</button>
      </div>
    </form>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $("#payment_method").on("change",function(){
      var met = $(this).val();
      if(met == 'Cheque'){
        $('.bank').show();
        $('.bank_name').show();
        $('#paid').attr('readonly','readonly');
      }
      else if(met == 'Bank'){
        $('.bank').hide();
        $('.bank_name').show();
        $('#paid').attr('readonly','readonly');  
      }else{
        $('.bank').hide();
        $('.bank_name').hide();
        $('#paid').removeAttr('readonly','readonly');
      }

    });
    $('#name').focus();
    $('#supplier_id').on('change',function(){
        var supplier_id = $(this).val();
        $.ajax({
             type:'GET',
             url : "{{url('editor/supplier/payment-info')}}",
             data:{supplier:supplier_id},             
             success:function(res){
              if(res){
                var bal = res.supplier_due;
                var pbal = res.supplier_balance;
                  $('#previous_balance').val(bal);
                  $('#prev_bal').val(pbal);
                  $('#lwo').val(obj);
                  $('#name').focus();
               }
              }
      });
    });
    $('#paid').on('keyup',function(e){
        var paid = $(this).val();
        var previous_balance  = $('#previous_balance').val();
        var balance = parseFloat(previous_balance) - parseFloat(paid);
        $('#balance').val(balance);
    });
  });
</script>
@endsection
