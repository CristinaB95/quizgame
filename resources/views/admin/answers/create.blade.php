@extends('layouts/admin')
@section('content')
<div class="container-fluid">

<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="#">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Add Answer</li>
</ol>


<!-- DataTables Example -->
<div class="card mb-3">
  <div class="card-header">
    Add new answer</div>
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
    <form action="/admin/questions/{{$question->id}}/answers" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
        <div class="form-group col-6">
            <label for="name">Content</label>
            <input type="text" class="form-control" id="content" name="content" value="{{old('content')}}" placeholder="Answer Content">
        </div>
        <div class="form-group col-6">
            <label for="status">Select status</label>
            <select name="status" id="status" class="form-control form-control-sm">
                <option value="0"> Inactive </option>
                <option value="1"> Active </option>
            </select>
        </div>
        <div class="form-group col-6">
            <label for="status">Select correct answer</label>
            <select name="valid" id="valid" class="form-control form-control-sm">
                <option value="0"> No </option>
                <option value="1"> Yes </option>
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