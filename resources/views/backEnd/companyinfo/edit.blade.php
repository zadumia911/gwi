@extends('backEnd.layouts.master') 
@section('title','Companyinfo Edit') 
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
               <div class="page-title">
                 <h6>Companyinfo Update</h6>
              </div>
            </div>
            <div class="col-sm-6">
                <div class="short-icon text-right">
                    <a href="{{url('superadmin/companyinfo/manage')}}" class="btn btn-primary"><i class="fa fa-eye"></i> Manage</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<div class="card">
    <!-- form start -->
    <form action="{{url('/superadmin/companyinfo/update')}}" method="POST" enctype="multipart/form-data" name="editForm">
        <input type="hidden" value="{{$edit_data->id}}" name="hidden_id">
    	@csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="branch_name">Branch Name</label>
                        <input type="text" class="form-control {{ $errors->has('branch_name') ? ' is-invalid' : '' }}" id="branch_name" name="branch_name" placeholder="Enter Branch Name ...." value="{{$edit_data->branch_name}}" />
                        @if ($errors->has('branch_name'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('branch_name') }}</strong>
						</span>
						@endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone">Contact No</label>
                        <input type="text" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" id="phone" name="phone" placeholder="Enter Phone Number ...." value="{{$edit_data->phone}}" />
						@if ($errors->has('phone'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('phone') }}</strong>
						</span>
						@endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control {{ $errors->has('branch_name') ? ' is-invalid' : '' }}" name="address" rows="3" placeholder="Enter Address ...">{{$edit_data->address}}</textarea>
                        @if ($errors->has('phone'))
						<span class="invalid-feedback" role="alert">
							<strong>{{ $errors->first('phone') }}</strong>
						</span>
						@endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputFile">Image</label>
                            <input type="file" name="image" class="fileupload form-control {{ $errors->has('image') ? ' is-invalid' : '' }}" id="image" />
                           
							@if ($errors->has('image'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('image') }}</strong>
							</span>
							@endif
                        <div class="dvPreview"><img src="{{asset($edit_data->image)}}"></div>
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
    document.forms['editForm'].elements['status'].value={{$edit_data->status}}
</script>
@endsection
