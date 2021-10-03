@extends('backEnd.layouts.master') 
@section('title','Expense Head Add') 
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
               <div class="page-title">
                    <h6>Expense Head Add</h6>
              </div>
            </div>
            <div class="col-sm-6">
                <div class="short-icon text-right">
                    <a href="{{url('editor/expensehead/manage')}}" class="btn btn-primary"><i class="fa fa-eye"></i> Manage</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<div class="card">
    <!-- form start -->
    <form action="{{url('/editor/expensehead/save')}}" method="POST" enctype="multipart/form-data">
    	@csrf
        <div class="card-body">
            <div class="row">
                <!-- Expense Head name -->
                <div class="col-sm-6">
                    <div class="form-group">
                      <label>Head Name <span>*</span></label>
                      <input type="text" name="expense_head" class="form-control{{ $errors->has('expense_head') ? ' is-invalid' : '' }}" value="{{ old('expense_head') }}">

                      @if ($errors->has('expense_head'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('expense_head') }}</strong>
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
