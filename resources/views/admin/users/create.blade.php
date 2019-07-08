@extends('layouts.admin')
@section('content')
<div class="container-fluid">

<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="/admin">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Overview</li>
</ol>


<!-- DataTables Example -->
<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i>
    Data Table Example</div>
  <div class="card-body">
  @if($errors->any())
  <div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
  </div>
  @endif
    <form action="/admin/users" method="POST">
    {{csrf_field()}}
        <div class="form-group col-6">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="{{old('username')}}" placeholder="Username">
        </div>
        <div class="form-group col-6">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{old('first_name')}}" placeholder="First Name">
        </div>
        <div class="form-group col-6">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{old('last_name')}}" placeholder="Last Name">
        </div>
        <div class="form-group col-6">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Enter email">
        </div>
        <div class="form-group col-6">
            <label for="password">Password</label>
            <input type="password" class="form-control-file" id="password" name="password" placeholder="Password">
        </div>
        <div class="form-group col-6">
            <label for="password_re">Reenter Password</label>
            <input type="password" class="form-control-file" id="password_re" name="password_re" placeholder="Reenter password">
        </div>
        <div class="form-group col-6">
            <label for="status">Select status</label>
            <select name="status" id="status" class="form-control form-control-sm">
                <option value="0"> Inactive </option>
                <option value="1"> Active </option>
            </select>
        </div>
        <div class="form-group col-6">
            <label for="role">Select role</label>
            <select name="role" id="role" class="form-control form-control-sm">
                <option value="0"> User </option>
                <option value="1"> Admin </option>
            </select>
        </div>
        <div class="form-group col-6">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
  </div>
</div>

</div>

@endsection