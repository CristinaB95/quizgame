@extends('layouts.admin')
@section('content')
<div class="container-fluid">

<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="#">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Add Category</li>
</ol>


<!-- DataTables Example -->
<div class="card mb-3">
  <div class="card-header">
    Add new category</div>
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
    <form action="/admin/categories" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
        <div class="form-group col-6">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="Category name">
        </div>
        <div class="form-group col-6">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{old('description')}}" placeholder="Enter a description">
        </div>
        <div class="form-group col-6">
            <label for="image">Image</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <div class="form-group col-6">
            <label for="status">Select status</label>
            <select name="status" id="status" class="form-control form-control-sm">
                <option value="0"> Inactive </option>
                <option value="1"> Active </option>
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