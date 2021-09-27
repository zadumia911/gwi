@extends('backEnd.layouts.master') 
@section('title','User Add') 
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
               <div class="page-title">
                    <h6>User Add</h6>
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
    <form action="{{url('/superadmin/user/save')}}" method="POST" enctype="multipart/form-data">
    	@csrf
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}">

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
                        <input type="text" name="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" value="{{ old('username') }}">

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
                      <input type="text" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}">

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
                    <input type="text" name="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ old('phone') }}">

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
                        <input type="text" name="designation" class="form-control{{ $errors->has('designation') ? ' is-invalid' : '' }}" value="{{ old('designation') }}">

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
                        <input type="file" name="image" class="fileupload form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" value="{{ old('image') }}" accept="image/*">

                        @if ($errors->has('image'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="dvPreview"></div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{ old('password') }}" required>

                      @if ($errors->has('password'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                      @endif
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                      <label for="confirm_password">Confirm Password</label>
                      <input type="password" class="form-control{{ $errors->has('confirm_password') ? ' is-invalid' : '' }}" value="{{ old('confirm_password') }}" name="confirm_password" required>
                    @if ($errors->has('confirm_password'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('confirm_password') }}</strong>
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

@endsection
