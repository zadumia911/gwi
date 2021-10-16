@extends('backEnd.layouts.master')
@section('title','Opening Cash')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <div class="page-title">
            <h6>Opening Cash</h6>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>

  <div class="card">
    <div class="card-body">
      <table id="example1" class="table table-bordered ">
        <thead>
          <tr>
            <th>SL</th>
            <th>Description</th>
            <th>Amount</th>
            <th class="action_button">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($show_datas as $key=>$value)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$value->comment}}</td>
            <td>{{$value->amount}}</td>
            <td class="action_button">
              <ul class="manage-btn-group">
                <li><button  class="btn btn-info" data-toggle="modal" data-target="#cash{{$value->id}}"><i class="fa fa-edit"></i></button></li>
              </ul>
          </td>
          </tr>
          <!-- Modal -->
        <div class="modal fade" id="cash{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cash</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{url('superadmin/cash/edit')}}" method="POST">
                  @csrf
                  <input type="hidden" value="{{$value->id}}" name="hidden_id">
                  <div class="form-group">
                    <input type="text" class="form-control" value="{{$value->comment}}" readonly>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" value="{{$value->amount}}" name="amount" required="">
                  </div>
                  <div class="form-group">
                   <button class="btn btn-success">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

@endsection