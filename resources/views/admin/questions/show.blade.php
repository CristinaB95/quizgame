@extends('layouts.admin')
@section('content')
      <div class="container-fluid">

<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="#">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Intrebarea {{$question->id}}</li>
</ol>


<!-- DataTables Example -->
<div class="card mb-3">
  <div class="card-header d-flex">
    Answers <a href="/admin/questions/{{$question->id}}/answers/create" class="ml-auto"><i class="fa fa-plus"></i></a></div>
  <div class="card-body">
  @if($question->answers->count())
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Id</th>
            <th>Content</th>
            <th>Is correct?</th>
            <th>Status</th>
            <th></th>
          </tr>
        </thead>
       <tbody>
       @foreach($question->answers as $answer)
       <form action="/admin/answers/{{$answer->id}}" method="POST" id="delete-{{$answer->id}}">
       {{csrf_field()}}
       {{method_field('DELETE')}}
       </form>
        <tr>
            <td> {{$answer->id}}</td>
            <td>{{substr($answer->content , 0, 50) }}</td>
            <td>{{$answer->valid == 0 ? "No" : "Yes" }}</td>
            <td>{{$answer->status == 0 ? "Inactive" : "Active"}}</td>
            <td>
              <a href="/admin/answers/{{$answer->id}}/edit"><i class="far fa-edit"></i></a>
              <a href="/admin/answers/{{$answer->id}}/change-status"><i class="far {{$answer->status == 0 ? $class= 'fa-eye' : $class='fa-eye-slash' }}"></i></a>
              <a href="/admin/answers/{{$answer->id}}" class="delete" data-id="{{$answer->id}}"><i class="far fa-trash-alt"></i></a>
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