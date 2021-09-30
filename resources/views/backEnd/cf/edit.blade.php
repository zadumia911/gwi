@extends('backEnd.layouts.master') 
@section('title','Clear & Forward Edit') 
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
               <div class="page-title">
                 <h6>Clear & Forward Update</h6>
              </div>
            </div>
            <div class="col-sm-6">
                <div class="short-icon text-right">
                    <a href="{{url('editor/cnf/manage')}}" class="btn btn-primary"><i class="fa fa-eye"></i> Manage</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<div class="card">
    <!-- form start -->
    <form action="{{url('/editor/cnf/update')}}" method="POST" enctype="multipart/form-data" name="editForm">
        <input type="hidden" value="{{$edit_data->id}}" name="hidden_id">
    	@csrf
        <div class="card-body">
            <div class="row">
                <input type="hidden" value="{{$edit_data->id}}" name="hidden_id">
                <div class="col-sm-6">
                    <div class="form-group">
                      <label>C&F Name</label>
                      <input type="text" name="cf_name" class="form-control{{ $errors->has('cf_name') ? ' is-invalid' : '' }}" value="{{$edit_data->cf_name}}">

                      @if ($errors->has('cf_name'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('cf_name') }}</strong>
                      </span>
                      @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="cf_address" class="form-control{{ $errors->has('cf_address') ? ' is-invalid' : '' }}" value="{{$edit_data->cf_address}}">

                        @if ($errors->has('cf_address'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('cf_address') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                      <label>Contact No</label>
                      <input type="text" name="cf_phone" class="form-control{{ $errors->has('cf_phone') ? ' is-invalid' : '' }}" value="{{$edit_data->cf_phone}}">

                      @if ($errors->has('cf_phone'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('cf_phone') }}</strong>
                      </span>
                      @endif
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Creation Date</label>
                    <input type="text" name="cf_date" class="form-control{{ $errors->has('cf_date') ? ' is-invalid' : '' }}" value="{{$edit_data->cf_date}}">

                    @if ($errors->has('cf_date'))
                    <span class="invalid-feedback" role="alert">
                       <strong>{{ $errors->first('cf_date') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>

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
<script type="text/javascript">
    document.forms['editForm'].elements['role_id'].value={{$edit_data->role_id}}
    document.forms['editForm'].elements['status'].value={{$edit_data->status}}
</script>
@endsection
