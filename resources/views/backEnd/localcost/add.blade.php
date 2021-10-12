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
    <!-- form start -->
    <form action="{{url('/editor/localcost/save')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="receive_date">Receiving Date</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text"  name="receive_date" class="form-control myDate" />
                        </div>
                        @if ($errors->has('receive_date'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('receive_date') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="cost_type">Type <span>*</span></label>
                        <select  class="cost_type form-control select2{{ $errors->has('cost_type') ? ' is-invalid' : '' }}" name="cost_type" value="{{ old('cost_type') }}" required>
                            <option value=""></option>
                            <option value="1">Local</option>
                            <option value="2">Foreign</option>
                        </select>
                        @if ($errors->has('cost_type'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('cost_type') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="supplier_id">Exporter Name <span>*</span></label>
                        <select class="form-control select2{{ $errors->has('supplier_id') ? ' is-invalid' : '' }}" id="supplier" name="supplier_id" value="{{ old('supplier_id') }}" required>
                        </select>
                        @if ($errors->has('supplier_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('supplier_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4 hide_input">
                    <div class="form-group">
                        <label for="cf_agent">C & F Agent Name </label>
                        <select class="form-control select2{{ $errors->has('cf_agent') ? ' is-invalid' : '' }}" name="cf_agent" value="{{ old('cf_agent') }}">
                            <option value="">Select..</option>
                            @foreach($cfagents as $key=>$value)
                            <option value="{{$value->id}}">{{$value->cf_name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('cf_agent'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('cf_agent') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4 hide_input">
                    <div class="form-group">
                        <label for="shipping_port">Shipping Port</label>
                        <input  type="text" class="form-control {{ $errors->has('shipping_port') ? ' is-invalid' : '' }}" id="shipping_port" value="{{old('shipping_port')}}" name="shipping_port" placeholder="Enter Shipping Port" />
                        @if ($errors->has('shipping_port'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('shipping_port') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4 hide_input">
                    <div class="form-group">
                        <label for="destination_id">Destination </label>
                        <select class="form-control select2{{ $errors->has('destination_id') ? ' is-invalid' : '' }}" name="destination_id" value="{{ old('destination_id') }}">
                            <option value=""></option>
                            @foreach($destination as $key=>$value)
                            <option value="{{$value->id}}">{{$value->destination_name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('destination_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('destination_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4 hide_input">
                    <div class="form-group">
                        <label for="lc_number">LC Number </label>
                        <input type="text" class="form-control {{ $errors->has('lc_number') ? ' is-invalid' : '' }}" id="lc_number" value="{{old('lc_number')}}" name="lc_number" placeholder="LC Number" />
                        @if ($errors->has('lc_number'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('lc_number') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4 hide_input">
                    <div class="form-group">
                        <label for="lc_date">LC Opening Date </label>
                        <input type="date" class="form-control {{ $errors->has('lc_date') ? ' is-invalid' : '' }} myDate" id="lc_date" value="{{old('lc_date')}}" name="lc_date" placeholder="LC Date" />
                        @if ($errors->has('lc_date'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('lc_date') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="lc_amount">LC Amount (USD) <span>*</span></label>
                        <input type="text" class="form-control {{ $errors->has('lc_amount') ? ' is-invalid' : '' }}" id="lc_amount" value="{{old('lc_amount')}}" name="lc_amount" placeholder="LC Amount (USD)" />
                        @if ($errors->has('lc_amount'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('lc_amount') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="bank_id">Bank Name <span>*</span></label>
                        <select class="form-control select2{{ $errors->has('bank_id') ? ' is-invalid' : '' }}" name="bank_id" value="{{ old('bank_id') }}" required>
                            <option value="">Select..</option>
                            @foreach($banks as $key=>$value)
                            <option value="{{$value->id}}">{{$value->bank_name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('bank_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('bank_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="container_receive">Container Receiver <span>*</span></label>
                        <input type="text" class="form-control {{ $errors->has('container_receive') ? ' is-invalid' : '' }}" id="container_receive" value="{{old('container_receive')}}" name="container_receive" placeholder="Container Received by" />
                        @if ($errors->has('container_receive'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('container_receive') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="gw_po">GW PO <span>*</span></label>
                        <input type="text" class="form-control {{ $errors->has('gw_po') ? ' is-invalid' : '' }}" id="gw_po" value="{{$gw_po}}" name="gw_po" placeholder="Purchase Order No..." readonly />
                        @if ($errors->has('gw_po'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('gw_po') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="supplier_invoice">Supplier Invoice <span>*</span></label>
                        <input type="text" class="form-control {{ $errors->has('supplier_invoice') ? ' is-invalid' : '' }}" id="supplier_invoice" value="{{old('supplier_invoice')}}" name="supplier_invoice" placeholder="Supplier Invoice No..." />
                        @if ($errors->has('supplier_invoice'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('supplier_invoice') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered" id="emptbl">
                    <thead class="bg-info">
                        <tr>
                            <th>Head Name</th>
                            <th>Amount</th>
                            <th>Comment</th>
                        </tr> 
                    </thead>
                    <tbody>
                        <tr> 
                            <td id="col0">
                             <select class="form-control" name="costhead_id[]" value="{{ old('costhead_id') }}" required>
                                <option value="">Select..</option>
                                @foreach($lcosthead as $key=>$value)
                                <option value="{{$value->id}}">{{$value->local_cost_head}}</option>
                                @endforeach
                            </select>
                            </td>
                            <td id="col1"><input type="number" class="form-control" placeholder="Amount*" name="amount[]" value="" /></td> 
                            <td id="col2"><input type="text" class="form-control" placeholder="Comment" name="comment[]" value="" /></td> 
                        </tr> 
                    </tbody> 
                </table> 
                 <table class="my-1 float-right"> 
                    <tbody>
                        <tr> 
                            <td><input type="button" class="btn-primary" value="Add" onclick="addRows()" /></td> 
                            <td><input type="button" class="btn-danger" value="Remove" onclick="deleteRows()" /></td> 
                        </tr> 
                    </tbody> 
                </table>
            </div>
        </div> 
        <div class="card-footer">
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-default">Clear</button>
            </div>
    </form>
</div>
<script type="text/javascript">
function addRows(){ 
    var table = document.getElementById('emptbl');
    var rowCount = table.rows.length;
    var cellCount = table.rows[0].cells.length; 
    var row = table.insertRow(rowCount);
    for(var i =0; i <= cellCount; i++){
        var cell = 'cell'+i;
        cell = row.insertCell(i);
        var copycel = document.getElementById('col'+i).innerHTML;
        cell.innerHTML=copycel;
        if(i == 2){ 
            var radioinput = document.getElementById('col2').getElementsByTagName('input'); 
            for(var j = 0; j <= radioinput.length; j++) { 
                if(radioinput[j].type == 'radio') { 
                    var rownum = rowCount;
                    radioinput[j].name = 'gender['+rownum+']';
                }
            }
        }
    }
}
function deleteRows(){
    var table = document.getElementById('emptbl');
    var rowCount = table.rows.length;
    console.log(rowCount);
    if(rowCount > '2'){
        var row = table.deleteRow(rowCount-1);
        rowCount--;
    }
    else{
        alert('There should be atleast one row');
    }
}
</script>
@endsection
