@extends('backEnd.layouts.master') 
@section('title','Change Password') 
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
               <div class="page-title">
                    <h6>Change Password</h6>
              </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<div class="card">
    <!-- form start -->
    <div class="card-body">
        <form action="{{url('/password/updated')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="old_password" class="col-form-label text-md-right">Old Password</label>
                                    <input id="old_password" type="password" class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" name="old_password">
                                    @if ($errors->has('old_password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('old_password') }}</strong>
                                    </span>
                                    @endif
                              </div>
                        </div>
                        <!-- form group end -->
                        <div class="col-sm-12">
                            <div class="form-group">
                               <label for="new_password" class="col-form-label text-md-right">New Password</label>
                                <input id="new_password" type="password" class="form-control{{ $errors->has('new_password') ? ' is-invalid' : '' }}" name="new_password">

                                @if ($errors->has('new_password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('new_password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                         <!-- form group end -->
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="password">Confirm Password</label>
                                  <input id="password-confirm" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation">
                                  @if ($errors->has('password_confirmation'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('password_confirmation') }}</strong>
                                  </span>
                                  @endif
                            </div>
                        </div>
                        <!-- form group end -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Change Password</button>
                            </div>
                        </div>
                        <!-- /.form-group -->
                    </div>
                 </div>
              </div>
            <!-- /.col -->
            </div>
         </form>
    </div>
</div>

@endsection
