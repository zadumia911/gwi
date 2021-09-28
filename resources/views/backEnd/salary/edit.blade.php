@extends('backEnd.layouts.master') 
@section('title','Salary Edit') 
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
               <div class="page-title">
                 <h6>Salary Update</h6>
              </div>
            </div>
            <div class="col-sm-6">
                <div class="short-icon text-right">
                    <a href="{{url('admin/salary/manage')}}" class="btn btn-primary"><i class="fa fa-eye"></i> Manage</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<div class="card">
    <!-- form start -->
    <form action="{{url('/admin/salary/update')}}" method="POST" enctype="multipart/form-data" name="editForm">
        <input type="hidden" value="{{$edit_data->id}}" name="hidden_id">
    	@csrf
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="date">Date <span>*</span></label>
                        <input type="text" class="myDate form-control {{ $errors->has('date') ? ' is-invalid' : '' }}" id="date" name="date" placeholder="Enter Date ...." value="{{ $edit_data->date}}" required/>
                        @if ($errors->has('date'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('date') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                      <label for="employee_id">Select Employee <span>*</span></label>
                      <select class="form-control select2{{ $errors->has('employee_id') ? ' is-invalid' : '' }}" name="employee_id" value="{{ old('employee_id') }}" required>
                        <option>Select..</option>
                        @foreach($employees as $key=>$value)
                        <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                      </select>
                       @if ($errors->has('employee_id'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('employee_id') }}</strong>
                      </span>
                      @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="salary">Salary </label>
                        <input type="text" disabled class="form-control {{ $errors->has('salary') ? ' is-invalid' : '' }}" id="salary" placeholder="Salary" value="{{old('salary')}}" name="salary"/>
                        @if ($errors->has('salary'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('salary') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                      <label for="salaryhead_id">Head Name <span>*</span></label>
                      <select class="form-control select2{{ $errors->has('salaryhead_id') ? ' is-invalid' : '' }}" name="salaryhead_id" value="{{ old('salaryhead_id') }}" required>
                        <option>Select..</option>
                        @foreach($salaryheads as $salaryhead)
                        <option value="{{$salaryhead->id}}">{{$salaryhead->title}}</option>
                        @endforeach
                      </select>
                       @if ($errors->has('salaryhead_id'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('salaryhead_id') }}</strong>
                      </span>
                      @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="amount">Amount <span>*</span></label>
                        <input type="text"  class="form-control {{ $errors->has('amount') ? ' is-invalid' : '' }}" id="amount" placeholder="amount" value="{{$edit_data->amount}}" name="amount"/>
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
                        <input type="text"  class="form-control {{ $errors->has('note') ? ' is-invalid' : '' }}" id="note" placeholder="note" value="{{$edit_data->note}}" name="note"/>
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
