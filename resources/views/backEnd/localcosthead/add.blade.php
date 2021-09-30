@extends('backEnd.layouts.master') 
@section('title','Local Cost Head Add') 
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
               <div class="page-title">
                    <h6>Local Cost Head Add</h6>
              </div>
            </div>
            <div class="col-sm-6">
                <div class="short-icon text-right">
                    <a href="{{url('editor/localcosthead/manage')}}" class="btn btn-primary"><i class="fa fa-eye"></i> Manage</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<div class="card">
    <!-- form start -->
    <form action="{{url('/editor/localcosthead/save')}}" method="POST" enctype="multipart/form-data">
    	@csrf
        <div class="card-body">
            <div class="row">
                <!-- Local Cost Head name -->
                <div class="col-sm-6">
                    <div class="form-group">
                      <label>Head Name <span>*</span></label>
                      <input type="text" name="local_cost_head" class="form-control{{ $errors->has('local_cost_head') ? ' is-invalid' : '' }}" value="{{ old('local_cost_head') }}">

                      @if ($errors->has('local_cost_head'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('local_cost_head') }}</strong>
                      </span>
                      @endif
                    </div>
                </div>
                <!-- status -->
                <div class="col-md-6">
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
