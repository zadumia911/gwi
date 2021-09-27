@extends('backEnd.layouts.master') 
@section('title','User Edit') 
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
               <div class="page-title">
                 <h6>User Update</h6>
              </div>
            </div>
            <div class="col-sm-6">
                <div class="short-icon text-right">
                    <a href="{{url('superadmin/user/manage')}}" class="btn btn-primary"><i class="fa fa-eye"></i> Manage</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<div class="card">
    <!-- form start -->
    <form action="{{url('/superadmin/user/update')}}" method="POST" enctype="multipart/form-data" name="editForm">
        <input type="hidden" value="{{$edit_data->id}}" name="hidden_id">
    	@csrf
        <div class="card-body">
            <div class="row">
                <input type="hidden" value="{{$edit_data->id}}" name="hidden_id">
                <div class="col-sm-6">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{$edit_data->name}}">

                      @if ($errors->has('name'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                      </span>
                      @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" value="{{$edit_data->username}}">

                        @if ($errors->has('username'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                      <label>Email</label>
                      <input type="text" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{$edit_data->email}}">

                      @if ($errors->has('email'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                      @endif
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{$edit_data->phone}}">

                    @if ($errors->has('phone'))
                    <span class="invalid-feedback" role="alert">
                       <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Designation</label>
                        <input type="text" name="designation" class="form-control{{ $errors->has('designation') ? ' is-invalid' : '' }}" value="{{$edit_data->designation}}">

                        @if ($errors->has('designation'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('designation') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="image">Picture</label>
                        <input type="file" name="image" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" value="{{ old('image') }}" accept="image/*">
                        <div class="dvPreview"><img src="{{asset($edit_data->image)}}"></div>
                        @if ($errors->has('image'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                        @endif

                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                      <label>User Role</label>
                      <select class="form-control select2{{ $errors->has('role_id') ? ' is-invalid' : '' }}" name="role_id" value="{{ old('role_id') }}" required>
                        <option>Select..</option>
                        @foreach($user_role as $key=>$value)
                        <option value="{{$value->id}}">{{$value->user_role}}</option>
                        @endforeach
                      </select>
                       @if ($errors->has('role_id'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('role_id') }}</strong>
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
