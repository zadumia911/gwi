@extends('backEnd.layouts.master') 
@section('title','Product Edit') 
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
               <div class="page-title">
                 <h6>Product Update</h6>
              </div>
            </div>
            <div class="col-sm-6">
                <div class="short-icon text-right">
                    <a href="{{url('editor/product/manage')}}" class="btn btn-primary"><i class="fa fa-eye"></i> Manage</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>

<div class="card">
    <!-- form start -->
    <form action="{{url('/editor/product/update')}}" method="POST" enctype="multipart/form-data" name="editForm">
        <input type="hidden" value="{{$edit_data->id}}" name="hidden_id">
    	@csrf
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="barcode">Barcode</label>
                        <input type="number"  class="form-control {{ $errors->has('barcode') ? ' is-invalid' : '' }}" id="barcode" value="{{$edit_data->barcode}}" name="barcode" maxlength="20" />
                        @if ($errors->has('barcode'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('barcode') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="category_id">Category Name <span>*</span></label>
                        <select class="form-control select2{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id" value="{{$edit_data->category_id}}" required>
                            <option>Select..</option>
                            @foreach($category as $key=>$value)
                            <option value="{{$value->id}}">{{$value->category_name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('category_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('category_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="brand_id">Brand Name <span>*</span></label>
                        <select class="form-control select2{{ $errors->has('brand_id') ? ' is-invalid' : '' }}" name="brand_id" value="{{$edit_data->brand_id}}" required>
                            <option>Select..</option>
                            @foreach($brand as $key=>$value)
                            <option value="{{$value->id}}">{{$value->brand_name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('brand_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('brand_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="pro_name">Product Name </label>
                        <input type="text" class="form-control {{ $errors->has('pro_name') ? ' is-invalid' : '' }}" id="pro_name" value="{{$edit_data->pro_name}}" name="pro_name" />
                        @if ($errors->has('pro_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pro_name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="pack_size">Pack Size</label>
                        <input type="text"  class="form-control {{ $errors->has('pack_size') ? ' is-invalid' : '' }}" id="pack_size" value="{{$edit_data->pack_size}}" name="pack_size" />
                        @if ($errors->has('pack_size'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('pack_size') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group clearfix">
                     <label for="" class="d-block">Product Status</label>
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
    document.forms['editForm'].elements['category_id'].value={{$edit_data->category_id}}
    document.forms['editForm'].elements['brand_id'].value={{$edit_data->brand_id}}
    document.forms['editForm'].elements['status'].value={{$edit_data->status}}
</script>
@endsection
