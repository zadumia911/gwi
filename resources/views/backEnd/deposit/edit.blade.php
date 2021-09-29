@extends('backEnd.layouts.master') 
@section('title','Bank Deposit Edit') 
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
               <div class="page-title">
                 <h6>Bank Deposit Update</h6>
              </div>
            </div>
            <div class="col-sm-6">
                <div class="short-icon text-right">
                    <a href="{{url('admin/deposit/manage')}}" class="btn btn-primary"><i class="fa fa-eye"></i> Manage</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<div class="card">
    <!-- form start -->
    <form action="{{url('/admin/deposit/update')}}" method="POST" enctype="multipart/form-data" name="editForm">
        <input type="hidden" value="{{$edit_data->id}}" name="hidden_id">
    	@csrf
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                      <label for="bank_id">Select Bank <span>*</span></label>
                      <select class="form-control select2{{ $errors->has('bank_id') ? ' is-invalid' : '' }}" name="bank_id" required>
                        <option>Select..</option>
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
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="date">Date  <span>*</span></label>
                        <input type="text"  class="myDate form-control {{ $errors->has('date') ? ' is-invalid' : '' }}" id="date" placeholder="Date" value="{{$edit_data->date}}" name="date"/>
                        @if ($errors->has('date'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('date') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="amount">Amount <span>*</span></label>
                        <input type="number"  class="form-control {{ $errors->has('amount') ? ' is-invalid' : '' }}" id="amount" placeholder="Amount" value="{{$edit_data->amount}}" name="amount"/>
                        @if ($errors->has('amount'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('amount') }}</strong>
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
    document.forms['editForm'].elements['bank_id'].value={{$edit_data->bank_id}}
</script>
@endsection
