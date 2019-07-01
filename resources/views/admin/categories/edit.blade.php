@extends('layouts.admin')
@section('content')
<div class="container-fluid">

<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="#">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Edit Category</li>
</ol>


<!-- DataTables Example -->
<div class="card mb-3">
  <div class="card-header">
    {{$category->name}}</div>
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
    <form action="/admin/categories/{{$category->id}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    {{method_field('PUT')}}
        <div class="form-group col-6">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}">
        </div>
        <div class="form-group col-6">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{$category->description}}">
        </div>
        <div class="form-group col-6">
            <label for="image">Image</label>
            <input type="file" class="form-control-file" id="image" name="image">
            <img class="image-category-edit py-3" src="/images/categories/{{$category->image}}">
        </div>
        <div class="form-group col-6">
            <label for="status">Select status</label>
            <select name="status" id="status" class="form-control form-control-sm">
                <option value="0" @if($category->status == 0) {{"selected"}} @endif > Inactive </option>
                <option value="1" @if($category->status == 1) {{"selected"}} @endif > Active </option>
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