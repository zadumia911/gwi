@extends('backEnd.layouts.master') 
@section('title','Supplier Edit') 
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
               <div class="page-title">
                 <h6>Supplier Update</h6>
              </div>
            </div>
            <div class="col-sm-6">
                <div class="short-icon text-right">
                    <a href="{{url('editor/supplier/manage')}}" class="btn btn-primary"><i class="fa fa-eye"></i> Manage</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<div class="card">
    <!-- form start -->
    <form action="{{url('/editor/supplier/update')}}" method="POST" enctype="multipart/form-data" name="editForm">
        <input type="hidden" value="{{$edit_data->id}}" name="hidden_id">
    	@csrf
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="supplier_type">Supplier Type <span>*</span></label>
                        <select class="form-control select2 {{ $errors->has('supplier_type') ? ' is-invalid' : '' }}" name="supplier_type" value="{{ old('supplier_type') }}" required>
                            <option value="">Select..</option>                            
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
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="supplier_name">Supplier Name <span>*</span></label>
                        <input type="text" class="form-control {{ $errors->has('supplier_name') ? ' is-invalid' : '' }}" id="supplier_name" name="supplier_name" placeholder="Enter Employee supplier_Name ...." value="{{$edit_data->supplier_name}}" required/>
                        @if ($errors->has('supplier_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('supplier_name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="supplier_address">Supplier Address </label>
                        <input type="text" class="form-control {{ $errors->has('supplier_address') ? ' is-invalid' : '' }}" id="supplier_address" value="{{$edit_data->supplier_address}}" name="supplier_address" />
                        @if ($errors->has('supplier_address'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('supplier_address') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="supplier_phone">Supplier Phone</label>
                        <input type="text"  class="form-control {{ $errors->has('supplier_phone') ? ' is-invalid' : '' }}" id="supplier_phone" value="{{$edit_data->supplier_phone}}" name="supplier_phone" />
                        @if ($errors->has('supplier_phone'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('supplier_phone') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="supplier_email">Supplier Email</label>
                        <input type="email"  class="form-control {{ $errors->has('supplier_email') ? ' is-invalid' : '' }}" id="supplier_email" value="{{$edit_data->supplier_email}}" name="supplier_email" />
                        @if ($errors->has('supplier_email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('supplier_email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="supplier_web">Web</label>
                        <input type="text"  class="form-control {{ $errors->has('supplier_web') ? ' is-invalid' : '' }}" id="supplier_web" value="{{$edit_data->supplier_web}}" name="supplier_web" />
                        @if ($errors->has('supplier_web'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('supplier_web') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="supplier_balance">Previous Balance <span>*</span></label>
                        <input type="number"  class="form-control {{ $errors->has('supplier_balance') ? ' is-invalid' : '' }}" id="supplier_balance" value="{{$edit_data->supplier_balance}}" name="supplier_balance" required />
                        @if ($errors->has('supplier_balance'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('supplier_balance') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group clearfix">
                     <label for="" class="d-block">Supplier Status</label>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="active" value="1" name="status" checked>
                        <label for="active">
                            Active
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="inactive" value="0" name="status">
                        <label for="inactive">
                            Inactive
                        </label>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-success">Submit</button>
            <button type="reset" class="btn btn-default">Clear</button>
        </div>
    </form>
</div>
<script type="text/javascript">
    document.forms['editForm'].elements['supplier_type'].value={{$edit_data->supplier_type}}
    document.forms['editForm'].elements['status'].value={{$edit_data->status}}
</script>
@endsection
