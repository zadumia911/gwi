@extends('backEnd.layouts.master')
@section('title','Expense Head Manage')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <div class="page-title">
            <h6>Expense Head Manage</h6>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="short-icon text-right">
            <a href="{{url('editor/expensehead/add')}}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
            <th>Head Name</th>
            <th>Status</th>
            <th class="action_button">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($show_datas as $key=>$value)
          <tr>
            <td>{{$loop->iteration}}</td>
             <td>{{$value->expense_head}}</td>
            <td>{{$value->status==1 ? 'Active' : 'Inactive'}}</td>
            <td class="action_button">
              <ul class="manage-btn-group">
                <li><a href="{{url('editor/expensehead/edit/'.$value->id)}}" class="btn btn-info"><i class="fa fa-edit"></i></a></li>
                <li>
                @if($value->status==1)
                  <form action="{{url('editor/expensehead/inactive')}}" method="POST">
                      @csrf
                      <input type="hidden" name="hidden_id" value="{{$value->id}}">
                      <button type="submit" class="btn btn-secondary" title="Inactive" onclick="return confirm('Are you want change this?')"><i class="fa fa-thumbs-down"></i></button>
                  </form>
                @else
                 <form action="{{url('editor/expensehead/active')}}" method="POST">
                  @csrf
                   <input type="hidden" name="hidden_id" value="{{$value->id}}">
                   <button type="submit" class="btn btn-success"  onclick="return confirm('Are you want change this?')" title="Active"><i class="fa fa-thumbs-up"></i></button> 
                 </form></li>
                @endif
                 <li>
                  <form action="{{url('editor/expensehead/delete')}}" method="POST">
                    @csrf
                    <input type="hidden" name="hidden_id" value="{{$value->id}}">
                    <button type="submit" onclick="return confirm('Are you delete this user?')" class="btn btn-danger"><i class="fa fa-times"></i></button>
                  </form>
                </li>
              </ul>
          </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->

@endsection