@extends('layouts.admin')
@section('content')
      <div class="container-fluid">

<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="/admin">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Categories</li>
</ol>


<!-- DataTables Example -->
<div class="card mb-3">
  <div class="card-header d-flex">
    Categories
    <a href="/admin/categories/create"  class="ml-auto"> <i class="fa fa-plus"></i></a>
    </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Description</th>
            <th>Photo</th>
            <th>Status</th>
            <th></th>
          </tr>
        </thead>
       <tbody>
       @foreach($categories as $category)
        <form action="/admin/categories/{{$category->id}}" method="POST" id="delete-{{$category->id}}">
        {{csrf_field()}}
        @method('delete')
        </form>
        <tr>
            <td> {{$category->id}}</td>
            <td><a href="/admin/categories/{{$category->id}}"> {{$category->name}} </a></td>
            <td>{{substr($category->description,0, 100)}}</td>
            <td class="text-center">
            <?php
              // var_dump(file_exists( public_path() . '/images/categories/'.$category->image));
            ?>
            @if(file_exists( public_path() .'/images/categories/'.$category->image))
              <img class="image-category" src="/images/categories/{{$category->image}}">
            @else
              <img class="image-category image-default"  src="/images/categories/default.png">
            @endif
            </td>
            <td>{{$category->status == 0 ? "Inactive" : "Active"}}</td>
            <td>
                <a href="/admin/categories/{{$category->id}}/edit"><i class="far fa-edit"></i></a>
                <a href="/admin/categories/{{$category->id}}/change-status"><i class="far {{$category->status == 0 ? $class= 'fa-eye' : $class='fa-eye-slash' }}"></i></a>
                <a href="/admin/categories/{{$category->id}}" class="delete" data-id="{{$category->id}}"><i class="far fa-trash-alt"></i></a>
            </td>
        </tr>
       @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

</div>
@endsection
@section('bottomscripts')
<script>
 $('.delete').on('click', function(e){
     e.preventDefault();
     console.log($(this).data('id'));
     $('#delete-'+$(this).data('id')).submit();
 })
</script>
@endsection