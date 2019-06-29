@extends('layouts.admin')
@section('content')
      <div class="container-fluid">

<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="#">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Contacts messages</li>
</ol>


<!-- DataTables Example -->
<div class="card mb-3">
  <div class="card-header d-flex">
    Contact messages:
  </div>
  <div class="card-body">
  @if($contacts->count())
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Date</th>
            <th></th>
          </tr>
        </thead>
       <tbody>
       @foreach($contacts as $contact)
        <tr>
            <td> {{$contact->id}}</td>
            <td> {{$contact->name}} </td>
            <td> {{$contact->email}} </td>
            <td> {{$contact->created_at}} </td>
            <td>
                <a href="/admin/contact/{{$contact->id}}"><i class="far fa-envelope-open"></i></a>
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
@endsection