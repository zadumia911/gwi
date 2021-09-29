@extends('backEnd.layouts.master') 
@section('title','Category Add') 
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
               <div class="page-title">
                    <h6>Category Add</h6>
              </div>
            </div>
            <div class="col-sm-6">
                <div class="short-icon text-right">
                    <a href="{{url('admin/category/manage')}}" class="btn btn-primary"><i class="fa fa-eye"></i> Manage</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<div class="card">
    <!-- form start -->
    <form action="{{url('/admin/category/save')}}" method="POST" enctype="multipart/form-data">
    	@csrf
        <div class="card-body">
            <div class="row">
                <!-- category name -->
                <div class="col-sm-6">
                    <div class="form-group">
                      <label>Category Name</label>
                      <input type="text" name="category_name" class="form-control{{ $errors->has('category_name') ? ' is-invalid' : '' }}" value="{{ old('category_name') }}">

                      @if ($errors->has('category_name'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('category_name') }}</strong>
                      </span>
                      @endif
                    </div>
                </div>
                <!-- status -->
                <div class="col-md-6">
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
