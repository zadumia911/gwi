@extends('backEnd.layouts.master') 
@section('title','Bank Edit') 
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
               <div class="page-title">
                 <h6>Bank Update</h6>
              </div>
            </div>
            <div class="col-sm-6">
                <div class="short-icon text-right">
                    <a href="{{url('admin/bank/manage')}}" class="btn btn-primary"><i class="fa fa-eye"></i> Manage</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<div class="card">
    <!-- form start -->
    <form action="{{url('/admin/bank/update')}}" method="POST" enctype="multipart/form-data" name="editForm">
        <input type="hidden" value="{{$edit_data->id}}" name="hidden_id">
    	@csrf
        <div class="card-body">
            <div class="row">
               <div class="col-sm-6">
                    <div class="form-group">
                        <label for="bank_name">Bank Name <span>*</span></label>
                        <input type="text"  class="form-control {{ $errors->has('bank_name') ? ' is-invalid' : '' }}" id="bank_name" placeholder="Bank name" value="{{$edit_data->bank_name}}" name="bank_name"/>
                        @if ($errors->has('bank_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('bank_name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="branch_name">Branch Name  <span>*</span></label>
                        <input type="text"  class="form-control {{ $errors->has('branch_name') ? ' is-invalid' : '' }}" id="branch_name" placeholder="Branch name" value="{{$edit_data->branch_name}}" name="branch_name"/>
                        @if ($errors->has('branch_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('branch_name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="bank_account">Bank Account <span>*</span></label>
                        <input type="text"  class="form-control {{ $errors->has('bank_account') ? ' is-invalid' : '' }}" id="bank_account" placeholder="Bank account" value="{{$edit_data->bank_account}}" name="bank_account"/>
                        @if ($errors->has('bank_account'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('bank_account') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="opening_balance">Opening Balance <span>*</span></label>
                        <input type="number"  class="form-control {{ $errors->has('opening_balance') ? ' is-invalid' : '' }}" id="opening_balance" placeholder="Opening balance" value="{{$edit_data->opening_balance}}" name="opening_balance"/>
                        @if ($errors->has('opening_balance'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('opening_balance') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="bank_address">Bank Address</label>
                        <textarea type="text"  class="form-control {{ $errors->has('bank_address') ? ' is-invalid' : '' }}" id="bank_address" placeholder="bank_address"  name="bank_address"/>{{$edit_data->bank_address}}</textarea>
                        @if ($errors->has('bank_address'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('bank_address') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="note">Note</label>
                        <textarea type="text"  class="form-control {{ $errors->has('note') ? ' is-invalid' : '' }}" id="note" placeholder="note"  name="note"/>{{$edit_data->note}}</textarea>
                        @if ($errors->has('note'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('note') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group clearfix">
                     <label for="" class="d-block">Published Status</label>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="active" value="1" name="status" checked>
                        <label for="active">Active</label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="radio" id="inactive" value="0" name="status">
                        <label for="inactive">Inactive</label>
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
    document.forms['editForm'].elements['employee_id'].value={{$edit_data->employee_id}}
    document.forms['editForm'].elements['salaryhead_id'].value={{$edit_data->salaryhead_id}}
    document.forms['editForm'].elements['status'].value={{$edit_data->status}}
</script>
@endsection
