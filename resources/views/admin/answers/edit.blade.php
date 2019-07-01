@extends('layouts/admin')
@section('content')
<div class="container-fluid">

<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="#">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Edit Answer</li>
</ol>


<!-- DataTables Example -->
<div class="card mb-3">
  <div class="card-header">
    Answer {{$answer->id}}</div>
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
    <form action="/admin/answers/{{$answer->id}}" method="POST">
    {{csrf_field()}}
    {{method_field('PUT')}}
        <div class="form-group col-6">
            <label for="name">Content</label>
            <input type="text" class="form-control" id="content" name="content" value="{{$answer->content}}" placeholder="Answer Content">
        </div>
        <div class="form-group col-6">
            <label for="status">Select status</label>
            <select name="status" id="status" class="form-control form-control-sm">
                <option value="0" @if($answer->status == 0) {{"selected"}} @endif> Inactive </option>
                <option value="1" @if($answer->status == 1) {{"selected"}} @endif> Active </option>
            </select>
        </div>
        <div class="form-group col-6">
            <label for="valid">Select correct answer</label>
            <select name="valid" id="valid" class="form-control form-control-sm">
                <option value="0" @if($answer->valid == 0) {{"selected"}} @endif> Yes </option>
                <option value="1" @if($answer->valid == 1) {{"selected"}} @endif> No </option>
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