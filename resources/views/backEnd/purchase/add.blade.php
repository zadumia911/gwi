@extends('backEnd.layouts.master') 
@section('title','Purchase Add') 
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <div class="page-title">
                    <h6>Purchase Add</h6>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="short-icon text-right">
                    <a href="{{url('editor/purchase/manage')}}" class="btn btn-primary"><i class="fa fa-eye"></i> Manage</a>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="card">
    <!-- form start -->
    <form action="{{url('/editor/purchase/save')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="join_date">Date</label>
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
                        <label for="category_id">Supplier Type <span>*</span></label>
                        <select class="form-control select2{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id" value="{{ old('category_id') }}" required>
                            <option value="">Select Type</option>
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
                        <label for="category_id">Supplier Name <span>*</span></label>
                        <select class="form-control select2{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id" value="{{ old('category_id') }}" required>
                            <option value="">Select Supplier</option>
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
                        <label for="pro_name">Old Due<span>*</span></label>
                        <input type="text" class="form-control {{ $errors->has('pro_name') ? ' is-invalid' : '' }}" id="pro_name" value="{{old('pro_name')}}" name="pro_name" placeholder="0.00" readonly />
                        @if ($errors->has('pro_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pro_name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="category_id">PO Number <span>*</span></label>
                        <select class="form-control select2{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id" value="{{ old('category_id') }}" required>
                            <option value="">Select PO</option>
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
                        <label for="pack_size">LC Number<span>*</span></label>
                        <input type="text" class="form-control {{ $errors->has('pack_size') ? ' is-invalid' : '' }}" id="pack_size" value="{{old('pack_size')}}" name="pack_size" placeholder="0.00" readonly />
                        @if ($errors->has('pack_size'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pack_size') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="category_id">Item Name <span>*</span></label>
                        <select class="form-control select2{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id" value="{{ old('category_id') }}" required>
                            <option value="">Select Item</option>
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
                        <label for="category_id">Unit <span>*</span></label>
                        <select class="form-control select2{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id" value="{{ old('category_id') }}" required>
                            <option value="">Select Unit</option>
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
                        <label for="pack_size">Quantity<span>*</span></label>
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
                        <label for="pack_size">Purchase Unit Price<span>*</span></label>
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
                        <label for="pack_size">Profit (%) <span>*</span></label>
                        <input type="text" class="form-control {{ $errors->has('pack_size') ? ' is-invalid' : '' }}" id="pack_size" value="{{old('pack_size')}}" name="pack_size" placeholder="0.00" readonly />
                        @if ($errors->has('pack_size'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pack_size') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="pack_size">Sale Unit Price <span>*</span></label>
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
                        <label for="join_date">Expire Date</label>
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
                        <label for="pack_size">Emergency Stock <span>*</span></label>
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
                        <label for="pack_size">Total Price <span>*</span></label>
                        <input type="text" class="form-control {{ $errors->has('pack_size') ? ' is-invalid' : '' }}" id="pack_size" value="{{old('pack_size')}}" name="pack_size" placeholder="0.00" readonly />
                        @if ($errors->has('pack_size'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pack_size') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="pack_size">Instock <span>*</span></label>
                        <input type="text" class="form-control {{ $errors->has('pack_size') ? ' is-invalid' : '' }}" id="pack_size" value="{{old('pack_size')}}" name="pack_size" placeholder="0.00" readonly />
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
    <div class="mx-4">
        <a href="" class="btn btn-info">Add List</a>        
    </div>
    <form action="">
        <div class="card-body">            
            <div class="row">
                <div class="col-sm-9">
                    <div id="table-div-left">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>*</th>
                                    <th>Item Name</th>
                                    <th>Unit</th>
                                    <th>Qty</th>
                                    <th>Unit Price</th>
                                    <th>Sale Price</th>
                                    <th>Total Price</th>
                                    <th>Instock</th>
                                    <th>Expire Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div id="table-div-right">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>                                    
                                    <th>Payments</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label for="">Vat</label>
                                            <input type="text" class="form-control" name="" placeholder="0.00">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label for="">Transport/Labour</label>
                                            <input type="text" class="form-control" name="" placeholder="0.00">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label for="">Discount</label>
                                            <input type="text" class="form-control" name="" placeholder="0.00">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label for="">Cash Paid</label>
                                            <input type="text" class="form-control" name="" placeholder="0.00">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label for="">Due Amount</label>
                                            <input type="text" class="form-control" name="" placeholder="0.00">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>                                        
                                        <div class="form-group">
                                            <label for="category_id">Payment Method <span>*</span></label>
                                            <select class="form-control" name="category_id" value="" required>
                                                <option value="">Cash</option>
                                                <option value="">Dues</option>
                                                <option value="">Cheque</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
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
