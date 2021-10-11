@extends('backEnd.layouts.master') 
@section('title','Payment Add') 
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
               <div class="page-title">
                    <h6>Payment Add</h6>
              </div>
            </div>
            <div class="col-sm-6">
                <div class="short-icon text-right">
                    <a href="{{url('editor/payment/manage')}}" class="btn btn-primary"><i class="fa fa-eye"></i> Manage</a>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="card">
    <!-- form start -->
    <form action="{{url('/editor/payment/save')}}" method="POST" enctype="multipart/form-data">
    	@csrf
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="customer_name">Voucher Number <span>*</span></label>
                        <input type="text" class="form-control {{ $errors->has('customer_name') ? ' is-invalid' : '' }}" id="customer_name" name="customer_name" placeholder="Enter Payment Name ...." value="{{ old('customer_name') }}" required/>
                        @if ($errors->has('customer_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('customer_name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="employee_id">Supplier Name <span>*</span></label>
                        <select class="form-control select2 {{ $errors->has('employee_id') ? ' is-invalid' : '' }}" name="employee_id" value="{{ old('employee_id') }}" required>
                            <option value="">Select Supplier</option>
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
                        <label for="employee_id">Payment Method <span>*</span></label>
                        <select class="form-control select2 {{ $errors->has('employee_id') ? ' is-invalid' : '' }}" name="employee_id" value="{{ old('employee_id') }}" required>
                            <option value="1">Cash</option>
                            <option value="2">Cheque</option>
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
                        <label for="employee_id">Bank Name <span>*</span></label>
                        <select class="form-control select2 {{ $errors->has('employee_id') ? ' is-invalid' : '' }}" name="employee_id" value="{{ old('employee_id') }}" required>
                            <option value="">Select Bank</option>
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
                        <label for="customer_name">Check Number <span>*</span></label>
                        <input type="text" class="form-control {{ $errors->has('customer_name') ? ' is-invalid' : '' }}" id="customer_name" name="customer_name" placeholder="Enter Payment Name ...." value="{{ old('customer_name') }}" required/>
                        @if ($errors->has('customer_name'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('customer_name') }}</strong>
						</span>
						@endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="customer_address">Check Amount </label>
                        <input type="text" class="form-control {{ $errors->has('customer_address') ? ' is-invalid' : '' }}" id="customer_address" value="{{ old('customer_address') }}" name="customer_address" />
						@if ($errors->has('customer_address'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('customer_address') }}</strong>
						</span>
						@endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="join_date">Approve Date</label>
                           <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" name="join_date" class="form-control myDate" >
                          </div>
                        @if ($errors->has('join_date'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('join_date') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="customer_phone">Cash Paid</label>
                        <input type="text"  class="form-control {{ $errors->has('customer_phone') ? ' is-invalid' : '' }}" id="customer_phone" value="{{old('customer_phone')}}" name="customer_phone" />
                        @if ($errors->has('customer_phone'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('customer_phone') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="customer_email">Balance</label>
                        <input type="email"  class="form-control {{ $errors->has('customer_email') ? ' is-invalid' : '' }}" id="customer_email" value="{{old('customer_email')}}" name="customer_email" />
                        @if ($errors->has('customer_email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('customer_email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="join_date">Date</label>
                           <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" name="join_date" class="form-control myDate" >
                          </div>
                        @if ($errors->has('join_date'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('join_date') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group clearfix">
                     <label for="" class="d-block">Payment Status</label>
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
