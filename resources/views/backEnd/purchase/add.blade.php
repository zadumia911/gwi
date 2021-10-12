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
    <!-- form start -->
    <form action="{{url('/editor/purchase/save')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="purchase_date">Date</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" name="purchase_date" class="form-control myDate" />
                        </div>
                        @if ($errors->has('purchase_date'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('purchase_date') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="supplier_type">Type <span>*</span></label>
                        <select  class="supplier_type form-control select2{{ $errors->has('supplier_type') ? ' is-invalid' : '' }}" name="supplier_type" value="{{ old('supplier_type') }}" required>
                            <option value=""></option>
                            <option value="1">Local</option>
                            <option value="2">Foreign</option>
                        </select>
                        @if ($errors->has('supplier_type'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('supplier_type') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="supplier_id">Supplier <span>*</span></label>
                        <select class="form-control select2{{ $errors->has('supplier_id') ? ' is-invalid' : '' }}" id="supplier" name="supplier_id" value="{{ old('supplier_id') }}" required>
                        </select>
                        @if ($errors->has('supplier_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('supplier_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="due">Old Due<span>*</span></label>
                        <input type="text" class="form-control {{ $errors->has('due') ? ' is-invalid' : '' }}" id="due" value="{{old('due')}}" name="due" placeholder="0.00" readonly />
                        @if ($errors->has('due'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('due') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="po_number">PO Number <span>*</span></label>
                        <select class="form-control select2{{ $errors->has('po_number') ? ' is-invalid' : '' }}" name="po_number" id="po_number"  required>
                            <option value="">Select</option>
                            @foreach($localcost as $value)
                            <option value="{{$value->id}}">{{$value->gw_po}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('po_number'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('po_number') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="lc_number">LC Number<span>*</span></label>
                        <input type="text" class="form-control {{ $errors->has('lc_number') ? ' is-invalid' : '' }}" id="lc_number" value="{{old('lc_number')}}" name="lc_number" placeholder="0.00" readonly />
                        @if ($errors->has('lc_number'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('lc_number') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="category_id">Item Name <span>*</span></label>
                        <select class="form-control select2{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id" value="{{ old('category_id') }}" required>
                            <option value="">Select Item</option>
                            @foreach($products as $value)
                            <option value="{{$value->id}}">{{$value->pro_name}}</option>
                            @endforeach
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
                        <label for="category_id">Unit <span>*</span></label>
                        <select class="form-control select2{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id" value="{{ old('category_id') }}" required>
                            <option value="">Select Unit</option>
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
                        <label for="pack_size">Quantity<span>*</span></label>
                        <input type="text" class="form-control {{ $errors->has('pack_size') ? ' is-invalid' : '' }}" id="pack_size" value="{{old('pack_size')}}" name="pack_size" placeholder="0.00" />
                        @if ($errors->has('pack_size'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pack_size') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="pack_size">Purchase Unit Price<span>*</span></label>
                        <input type="text" class="form-control {{ $errors->has('pack_size') ? ' is-invalid' : '' }}" id="pack_size" value="{{old('pack_size')}}" name="pack_size" placeholder="0.00" />
                        @if ($errors->has('pack_size'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pack_size') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="pack_size">Profit (%) <span>*</span></label>
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
                        <label for="pack_size">Sale Unit Price <span>*</span></label>
                        <input type="text" class="form-control {{ $errors->has('pack_size') ? ' is-invalid' : '' }}" id="pack_size" value="{{old('pack_size')}}" name="pack_size" placeholder="0.00" />
                        @if ($errors->has('pack_size'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pack_size') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="join_date">Expire Date</label>
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
                        <label for="pack_size">Emergency Stock <span>*</span></label>
                        <input type="text" class="form-control {{ $errors->has('pack_size') ? ' is-invalid' : '' }}" id="pack_size" value="{{old('pack_size')}}" name="pack_size" placeholder="0.00" />
                        @if ($errors->has('pack_size'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pack_size') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="pack_size">Total Price <span>*</span></label>
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
                        <label for="pack_size">Instock <span>*</span></label>
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
                                    <th>Unit</th>
                                    <th>Qty</th>
                                    <th>Unit Price</th>
                                    <th>Sale Price</th>
                                    <th>Total Price</th>
                                    <th>Instock</th>
                                    <th>Expire Date</th>
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
                                            <label for="">Vat</label>
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
