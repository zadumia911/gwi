@extends('backEnd.layouts.master') 
@section('title','Employee Add') 
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
               <div class="page-title">
                    <h6>Employee Add</h6>
              </div>
            </div>
            <div class="col-sm-6">
                <div class="short-icon text-right">
                    <a href="{{url('admin/employee/manage')}}" class="btn btn-primary"><i class="fa fa-eye"></i> Manage</a>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="card">
    <!-- form start -->
    <form action="{{url('/admin/employee/save')}}" method="POST" enctype="multipart/form-data">
    	@csrf
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="name">Employee Name <span>*</span></label>
                        <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" placeholder="Enter Employee Name ...." value="{{ old('name') }}" required/>
                        @if ($errors->has('name'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
						@endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="employee_code">Employee Code </label>
                        <input type="text" disabled class="form-control {{ $errors->has('employee_code') ? ' is-invalid' : '' }}" id="employee_code" value="{{$employee_code}}" name="employee_code" />
						@if ($errors->has('employee_code'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('employee_code') }}</strong>
						</span>
						@endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="father_name">Father Name</label>
                        <input type="text"  class="form-control {{ $errors->has('father_name') ? ' is-invalid' : '' }}" id="father_name" value="{{old('father_name')}}" name="father_name" />
                        @if ($errors->has('father_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('father_name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="mother_name">Mother Name</label>
                        <input type="text"  class="form-control {{ $errors->has('mother_name') ? ' is-invalid' : '' }}" id="mother_name" value="{{old('mother_name')}}" name="mother_name" />
                        @if ($errors->has('mother_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('mother_name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="address">Employee Address</label>
                        <input type="text"  class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" id="address" value="{{old('address')}}" name="address" />
                        @if ($errors->has('address'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="phone">Contact No <span>*</span></label>
                        <input type="text"  class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" id="phone" value="{{old('phone')}}" name="phone" required />
                        @if ($errors->has('phone'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="designation">Designation</label>
                        <input type="text"  class="form-control {{ $errors->has('designation') ? ' is-invalid' : '' }}" id="designation" value="{{old('designation')}}" name="designation" />
                        @if ($errors->has('designation'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('designation') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="department">Department</label>
                        <input type="text"  class="form-control {{ $errors->has('department') ? ' is-invalid' : '' }}" id="department" value="{{old('department')}}" name="department" />
                        @if ($errors->has('department'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('department') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="join_date">Join Date</label>
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
                        <label for="salary">Salary <span>*</span></label>
                        <input type="text"  class="form-control {{ $errors->has('salary') ? ' is-invalid' : '' }}" id="salary" value="{{old('salary')}}" name="salary" required />
                        @if ($errors->has('salary'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('salary') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputFile">Image</label>
                        <div class="input-group">
                            <input type="file" name="image" class="fileupload form-control {{ $errors->has('image') ? ' is-invalid' : '' }}" required />
							@if ($errors->has('image'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('image') }}</strong>
							</span>
							@endif
                        </div>
                        <div class="dvPreview"></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group clearfix">
                     <label for="" class="d-block">Employee Status</label>
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
