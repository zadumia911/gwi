@extends('backEnd.layouts.master') 
@section('title','Withdraw Add') 
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
               <div class="page-title">
                    <h6>Withdraw Add</h6>
              </div>
            </div>
            <div class="col-sm-6">
                <div class="short-icon text-right">
                    <a href="{{url('admin/withdraw/manage')}}" class="btn btn-primary"><i class="fa fa-eye"></i> Manage</a>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="card">
    <!-- form start -->
    <form action="{{url('/admin/withdraw/save')}}" method="POST" enctype="multipart/form-data">
    	@csrf
        <div class="card-body">
            <div class="row">
               <div class="col-sm-6">
                    <div class="form-group">
                      <label for="bank_id">Select Bank <span>*</span></label>
                      <select class="form-control select2{{ $errors->has('bank_id') ? ' is-invalid' : '' }}" name="bank_id" value="{{ old('bank_id') }}" required>
                        <option>Select..</option>
                        @foreach($banks as $key=>$value)
                        <option value="{{$value->id}}">{{$value->bank_name}}</option>
                        @endforeach
                      </select>
                       @if ($errors->has('bank_id'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('bank_id') }}</strong>
                      </span>
                      @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="cheque_number">Cheque Number  <span>*</span></label>
                        <input type="text"  class="form-control {{ $errors->has('cheque_number') ? ' is-invalid' : '' }}" id="cheque_number" placeholder="Cheque Number" value="{{old('cheque_number')}}" name="cheque_number"/>
                        @if ($errors->has('cheque_number'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('cheque_number') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="amount">Amount <span>*</span></label>
                        <input type="number"  class="form-control {{ $errors->has('amount') ? ' is-invalid' : '' }}" id="amount" placeholder="Amount" value="{{old('amount')}}" name="amount"/>
                        @if ($errors->has('amount'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('amount') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="note">Note</label>
                        <textarea type="text"  class="form-control {{ $errors->has('note') ? ' is-invalid' : '' }}" id="note" placeholder="note" value="{{old('note')}}" name="note"/></textarea>
                        @if ($errors->has('note'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('note') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="col-sm-6">
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
