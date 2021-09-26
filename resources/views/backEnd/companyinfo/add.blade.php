@extends('backEnd.layouts.master') @section('title','Companyinfo Add') @section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Companyinfo Add</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Companyinfo Add</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-12">
                <div class="short-icon text-right">
                    <a href="{{url('superadmin/companyinfo/manage')}}" class="btn btn-primary"><i class="fa fa-cogs"></i> Manage</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-header -->

    <!-- form start -->
    <form action="{{url('/superadmin/companyinfo/save')}}" method="POST" enctype="multipart/form-data">
    	@csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="branch_name">Branch Name</label>
                        <input type="text" class="form-control {{ $errors->has('branch_name') ? ' is-invalid' : '' }}" id="branch_name" name="branch_name" placeholder="Enter Branch Name ...." value="{{ old('branch_name') }}" />
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
                        <input type="text" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" id="phone" name="phone" placeholder="Enter Phone Number ...." />
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
                        <textarea class="form-control {{ $errors->has('branch_name') ? ' is-invalid' : '' }}" name="address" rows="3" placeholder="Enter Address ..."></textarea>
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
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input{{ $errors->has('image') ? ' is-invalid' : '' }}" id="image" />
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
							@if ($errors->has('image'))
							<span class="invalid-feedback" role="alert">
								<strong>{{ $errors->first('image') }}</strong>
							</span>
							@endif
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-default">clear</button>
        </div>
    </form>
</div>

@endsection
