@extends('backEnd.layouts.master')
@section('title','Employee Manage')
@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <div class="page-title">
            <h6>Employee Manage</h6>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="short-icon text-right">
            <a href="{{url('admin/employee/add')}}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>

  <div class="card">
    <div class="card-body">
      <table id="example1" class="table table-bordered table-responsive">
        <thead>
          <tr>
            <th>SL</th>
            <th>Empoyee Name</th>
            <th>Empoyee Code</th>
            <th>Join Date</th>
            <th>Department</th>
            <th>Designation</th>
            <th>Address</th>
            <th>Contact</th>
            <th>Salary</th>
            <th>Status</th>
            <th class="action_button">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($show_datas as $key=>$value)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$value->name}}</td>
            <td>{{$value->employee_code}}</td>
            <td>{{$value->join_date}}</td>
            <td>{{$value->department}}</td>
            <td>{{$value->designation}}</td>
            <td>{{$value->address}}</td>
            <td>{{$value->phone}}</td>
            <td>{{$value->salary}}</td>
            <td>{{$value->status ==1 ? 'Active' : 'Inactive'}}</td>
            <td class="action_button">
              <ul class="manage-btn-group">
                <li><a href="{{url('admin/employee/edit/'.$value->id)}}" class="btn btn-info"><i class="fa fa-edit"></i></a></li>
                <li>@if($value->status==1)
                  <form action="{{url('admin/employee/inactive')}}" method="POST">
                      @csrf
                      <input type="hidden" name="hidden_id" value="{{$value->id}}">
                      <button type="submit" class="btn btn-secondary" title="Inactive" onclick="return confirm('Are you want change this?')"><i class="fa fa-thumbs-down"></i></button>
                  </form>
                @else
                <form action="{{url('admin/employee/active')}}" method="POST">
                  @csrf
                  <input type="hidden" name="hidden_id" value="{{$value->id}}">
                  <button type="submit" class="btn btn-success"  onclick="return confirm('Are you want change this?')" title="Active"><i class="fa fa-thumbs-up"></i></button> 
                </form></li>
                @endif
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