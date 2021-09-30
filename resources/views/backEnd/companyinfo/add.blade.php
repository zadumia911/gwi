@extends('backEnd.layouts.master') 
@section('title','Companyinfo Add') 
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
               <div class="page-title">
                    <h6>Companyinfo Add</h6>
              </div>
            </div>
            <div class="col-sm-6">
                <div class="short-icon text-right">
                    <a href="{{url('superadmin/companyinfo/manage')}}" class="btn btn-primary"><i class="fa fa-eye"></i> Manage</a>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="card">
    <!-- form start -->
    <form action="{{url('/superadmin/companyinfo/save')}}" method="POST" enctype="multipart/form-data">
    	@csrf
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="branch_name">Branch Name <span>*</span></label>
                        <input type="text" class="form-control {{ $errors->has('branch_name') ? ' is-invalid' : '' }}" id="branch_name" name="branch_name" placeholder="Enter Branch Name ...." value="{{ old('branch_name') }}" required/>
                        @if ($errors->has('branch_name'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('branch_name') }}</strong>
						</span>
						@endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="phone">Contact No <span>*</span></label>
                        <input type="text" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" id="phone" value="{{old('phone')}}" name="phone" placeholder="Enter Phone Number ...." required/>
						@if ($errors->has('phone'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('phone') }}</strong>
						</span>
						@endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Address <span>*</span></label>
                        <textarea class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" rows="3" placeholder="Enter Address ..." required>{{old('address')}}</textarea>
                        @if ($errors->has('address'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('address') }}</strong>
						</span>
						@endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputFile">Image <span>*</span></label>
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
                     <label for="" class="d-block">Published Status <span>*</span></label>
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
