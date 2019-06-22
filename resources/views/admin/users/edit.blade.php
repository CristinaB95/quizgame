@extends('layouts.admin')
@section('content')
<div class="container-fluid">

<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="#">Dashboard</a>
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
    <form action="/admin/users/{{$user->id}}" method="POST">
    {{csrf_field()}}
    {{method_field('PUT')}}
        <div class="form-group col-6">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="{{$user->username}}">
        </div>
        <div class="form-group col-6">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{$user->first_name}}">
        </div>
        <div class="form-group col-6">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{$user->last_name}}">
        </div>
        <div class="form-group col-6">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
        </div>
        <div class="form-group col-6">
            <label for="password">Password</label>
            <input type="password" class="form-control-file" id="password" name="password" value="{{$user->password}}">
        </div>
        <div class="form-group col-6">
            <label for="password_re">Reenter Password</label>
            <input type="password" class="form-control-file" id="password_re" name="password_re" value="{{$user->password}}">
        </div>
        <div class="form-group col-6">
            <label for="status">Select status</label>
            <select name="status" id="status" class="form-control form-control-sm">
                <option value="0" {{$user->status == 0 ? "selected" : ""}}> Inactive </option>
                <option value="1" {{$user->status == 1 ? "selected" : ""}}> Active </option>
            </select>
        </div>
        <div class="form-group col-6">
            <label for="role">Select role</label>
            <select name="role" id="role" class="form-control form-control-sm">
                <option value="0" {{$user->role == 0 ? "selected" : ""}}> User </option>
                <option value="1" {{$user->role == 1 ? "selected" : ""}}> Admin </option>
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