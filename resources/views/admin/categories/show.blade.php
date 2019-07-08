@extends('layouts.admin')
@section('content')
      <div class="container-fluid">

<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="/admin">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">{{$category->name}}</li>
</ol>


<!-- DataTables Example -->
<div class="card mb-3">
  <div class="card-header d-flex">
    Questions 
    <a href="/admin/categories/{{$category->id}}/questions/create" class="ml-auto"><i class="fa fa-plus"></i></a></div>
  <div class="card-body">
  @if($category->questions->count())
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Id</th>
            <th>Content</th>
            <th>Date added</th>
            <th>Status</th>
            <th></th>
            <th>Answers</th>
          </tr>
        </thead>
       <tbody>
       @foreach($category->questions as $question)
        <form action="/admin/questions/{{$question->id}}" method="POST" id="delete-{{$question->id}}">
        {{csrf_field()}}
        @method('delete')
        </form>
        <tr>
            <td> {{$question->id}}</td>
            <td><a href="/admin/questions/{{$question->id}}">{{substr($question->content,0,55)}}</a></td>
            <td>{{$question->created_at}}</td>
            <td>{{$question->status == 0 ? "Inactive" : "Active"}}</td>
            <td>
                <a href="/admin/questions/{{$question->id}}/edit"><i class="far fa-edit"></i></a>
                <a href="/admin/questions/{{$question->id}}/change-status"><i class="far {{$question->status == 0 ? $class= 'fa-eye' : $class='fa-eye-slash' }}"></i></a>
                <a href="/admin/questions/{{$question->id}}" class="delete" data-id="{{$question->id}}"><i class="far fa-trash-alt"></i></a>
            </td>
            <td>
                <a href="/admin/questions/{{$question->id}}"><i class="fas fa-angle-right"></i></a>
            </td>
        </tr>
       @endforeach
        </tbody>
      </table>
    </div>
    @endif
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