@extends('backEnd.layouts.master') 
@section('title','Daily Expense Edit') 
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
               <div class="page-title">
                 <h6>Daily Expense Update</h6>
              </div>
            </div>
            <div class="col-sm-6">
                <div class="short-icon text-right">
                    <a href="{{url('editor/dailyexpense/manage')}}" class="btn btn-primary"><i class="fa fa-eye"></i> Manage</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<div class="card">
    <!-- form start -->
    <form action="{{url('/editor/dailyexpense/update')}}" method="POST" enctype="multipart/form-data" name="editForm">
        <input type="hidden" value="{{$edit_data->id}}" name="hidden_id">
    	@csrf
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="expense_head_id">Head Name <span>*</span></label>
                        <select class="form-control select2 {{ $errors->has('expense_head_id') ? ' is-invalid' : '' }}" name="expense_head_id" value="{{$edit_data->expense_head_id}}" required>
                            <option value="">Select Head</option>
                            @foreach($expense_head as $key=>$value)
                            <option value="{{$value->id}}">{{$value->expense_head}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('expense_head_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('expense_head_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="expense_type_id">Type <span>*</span></label>
                        <select class="form-control select2 {{ $errors->has('expense_type_id') ? ' is-invalid' : '' }}" name="expense_type_id" value="{{$edit_data->expense_type_id }}" required>                           
                            <option value="1">Expenses</option>
                        </select>
                        @if ($errors->has('expense_type_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('expense_type_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="expense_date">Join Date</label>
                           <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" name="expense_date" class="form-control myDate" >
                          </div>
                        @if ($errors->has('expense_date'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('expense_date') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="comment">Comment </label>
                        <input type="text" class="form-control {{ $errors->has('comment') ? ' is-invalid' : '' }}" id="comment" value="{{$edit_data->comment}}" name="comment" />
                        @if ($errors->has('comment'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('comment') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="expense_amount">Amount</label>
                        <input type="number"  class="form-control {{ $errors->has('expense_amount') ? ' is-invalid' : '' }}" id="expense_amount" value="{{$edit_data->expense_amount}}" name="expense_amount" />
                        @if ($errors->has('expense_amount'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('expense_amount') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group clearfix">
                     <label for="" class="d-block">Daily Expense Status</label>
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
    document.forms['editForm'].elements['expense_head_id'].value={{$edit_data->expense_head_id}}
    document.forms['editForm'].elements['expense_type_id'].value={{$edit_data->expense_type_id}}
    document.forms['editForm'].elements['status'].value={{$edit_data->status}}
</script>
@endsection
