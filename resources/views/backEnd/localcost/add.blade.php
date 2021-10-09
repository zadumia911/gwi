@extends('backEnd.layouts.master') 
@section('title','Local Cost Add') 
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <div class="page-title">
                    <h6>Local Cost Add</h6>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="short-icon text-right">
                    <a href="{{url('editor/localcost/manage')}}" class="btn btn-primary"><i class="fa fa-eye"></i> Manage</a>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="card">
    <!-- form start -->
    <form action="{{url('/editor/localcost/save')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="join_date">Receiving Date</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input type="text" name="join_date" class="form-control myDate" />
                        </div>
                        @if ($errors->has('join_date'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('join_date') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="category_id">Type <span>*</span></label>
                        <select class="form-control select2{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id" value="{{ old('category_id') }}" required>
                            <option value=""></option>
                            <option value="1">Local</option>
                            <option value="2">Foreign</option>
                        </select>
                        @if ($errors->has('category_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('category_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="brand_id">Exporter Name <span>*</span></label>
                        <select class="form-control select2{{ $errors->has('brand_id') ? ' is-invalid' : '' }}" name="brand_id" value="{{ old('brand_id') }}" required>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                        @if ($errors->has('brand_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('brand_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="brand_id">C & F Agent Name <span>*</span></label>
                        <select class="form-control select2{{ $errors->has('brand_id') ? ' is-invalid' : '' }}" name="brand_id" value="{{ old('brand_id') }}" required>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                        @if ($errors->has('brand_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('brand_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="pro_name">Shipping Port<span>*</span></label>
                        <input type="text" class="form-control {{ $errors->has('pro_name') ? ' is-invalid' : '' }}" id="pro_name" value="{{old('pro_name')}}" name="pro_name" placeholder="Enter Shipping Port" />
                        @if ($errors->has('pro_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pro_name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="brand_id">Destination <span>*</span></label>
                        <select class="form-control select2{{ $errors->has('brand_id') ? ' is-invalid' : '' }}" name="brand_id" value="{{ old('brand_id') }}" required>
                            <option value=""></option>
                            <option value="1">Chittagong Port</option>
                            <option value="2">Kamalapore Port</option>
                            <option value="3">Pangaon Port</option>
                            <option value="4">Mongala Port</option>
                        </select>
                        @if ($errors->has('brand_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('brand_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="pack_size">LC Number <span>*</span></label>
                        <input type="text" class="form-control {{ $errors->has('pack_size') ? ' is-invalid' : '' }}" id="pack_size" value="{{old('pack_size')}}" name="pack_size" placeholder="LC Number" />
                        @if ($errors->has('pack_size'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pack_size') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="pack_size">LC Opening Date <span>*</span></label>
                        <input type="text" class="form-control {{ $errors->has('pack_size') ? ' is-invalid' : '' }}" id="pack_size" value="{{old('pack_size')}}" name="pack_size" placeholder="LC Date" />
                        @if ($errors->has('pack_size'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pack_size') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="pack_size">LC Amount (USD) <span>*</span></label>
                        <input type="text" class="form-control {{ $errors->has('pack_size') ? ' is-invalid' : '' }}" id="pack_size" value="{{old('pack_size')}}" name="pack_size" placeholder="LC Amount (USD)" />
                        @if ($errors->has('pack_size'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pack_size') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="brand_id">Bank Name <span>*</span></label>
                        <select class="form-control select2{{ $errors->has('brand_id') ? ' is-invalid' : '' }}" name="brand_id" value="{{ old('brand_id') }}" required>
                            <option value=""></option>
                        </select>
                        @if ($errors->has('brand_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('brand_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="pack_size">Container Receiver <span>*</span></label>
                        <input type="text" class="form-control {{ $errors->has('pack_size') ? ' is-invalid' : '' }}" id="pack_size" value="{{old('pack_size')}}" name="pack_size" placeholder="Container Received by" />
                        @if ($errors->has('pack_size'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pack_size') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="pack_size">Purchase Order <span>*</span></label>
                        <input type="text" class="form-control {{ $errors->has('pack_size') ? ' is-invalid' : '' }}" id="pack_size" value="{{old('pack_size')}}" name="pack_size" placeholder="Purchase Order No..." />
                        @if ($errors->has('pack_size'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pack_size') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="pack_size">Supplier Invoice <span>*</span></label>
                        <input type="text" class="form-control {{ $errors->has('pack_size') ? ' is-invalid' : '' }}" id="pack_size" value="{{old('pack_size')}}" name="pack_size" placeholder="Supplier Invoice No..." />
                        @if ($errors->has('pack_size'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pack_size') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        
    </form>
    <form action="">
        <div class="card-body">            
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="my-4 text-center">Head Cost Entry</h3>
                </div>
                <!-- input -->
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="brand_id">Head Name <span>*</span></label>
                        <select class="form-control select2{{ $errors->has('brand_id') ? ' is-invalid' : '' }}" name="brand_id" value="{{ old('brand_id') }}" required>
                            <option value=""></option>
                        </select>
                        @if ($errors->has('brand_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('brand_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="pack_size">Amount<span>*</span></label>
                        <input type="text" class="form-control {{ $errors->has('pack_size') ? ' is-invalid' : '' }}" id="pack_size" value="{{old('pack_size')}}" name="pack_size" placeholder="0.00" />
                        @if ($errors->has('pack_size'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pack_size') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="pack_size">Comment<span>*</span></label>
                        <input type="text" class="form-control {{ $errors->has('pack_size') ? ' is-invalid' : '' }}" id="pack_size" value="{{old('pack_size')}}" name="pack_size" placeholder="Enter Comment" />
                        @if ($errors->has('pack_size'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pack_size') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form action="">
        <div class="card-body">            
            <div class="row">
                <div class="col-sm-12">
                    <div>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>*</th>
                                    <th>Head Name</th>
                                    <th>Amount</th>
                                    <th>Comment</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-default">Clear</button>
            </div>
        </div>
    </form>
</div>

@endsection
