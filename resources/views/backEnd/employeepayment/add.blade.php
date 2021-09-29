@extends('backEnd.layouts.master') 
@section('title','Employee Payment Add') 
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
               <div class="page-title">
                    <h6>Employee Payment Add</h6>
              </div>
            </div>
            <div class="col-sm-6">
                <div class="short-icon text-right">
                    <a href="{{url('admin/employee-payment/manage')}}" class="btn btn-primary"><i class="fa fa-eye"></i> Manage</a>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="card">
    <!-- form start -->
    <form action="{{url('/admin/employee-payment/save')}}" method="POST" enctype="multipart/form-data">
    	@csrf
        <div class="card-body">
            <div class="row">

                <div class="col-sm-6">
                    <div class="form-group">
                      <label for="employee_id">Employee Name <span>*</span></label>
                      <select class="form-control select2{{ $errors->has('employee_id') ? ' is-invalid' : '' }}" name="employee_id" value="{{ old('employee_id') }}" required>
                        <option>Select..</option>
                        @foreach($employees as $key=>$value)
                        <option value="{{$value->id}}">{{$value->name}} {{$value->address}} {{$value->phone}}</option>
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
                        <label for="date">Date <span>*</span></label>
                        <input type="text" class="myDate form-control {{ $errors->has('date') ? ' is-invalid' : '' }}" id="date" name="date" placeholder="Enter Date ...." value="{{ old('date') }}" required/>
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
                        <input type="number"  class="form-control {{ $errors->has('amount') ? ' is-invalid' : '' }}" id="amount" placeholder="amount" value="{{old('amount')}}" name="amount"/>
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
                        <input type="text"  class="form-control {{ $errors->has('note') ? ' is-invalid' : '' }}" id="note" placeholder="note" value="{{old('note')}}" name="note"/>
                        @if ($errors->has('note'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('note') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group clearfix">
                     <label for="" class="d-block">Published Status</label>
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

@endsection
