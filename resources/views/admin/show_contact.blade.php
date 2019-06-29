@extends('layouts.admin')
@section('content')
      <div class="container-fluid">
<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="#">Dashboard</a>
  </li>
  <li class="breadcrumb-item active"></li>
</ol>


<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header d-flex">
        Send on: {{date('d-M-Y' , strtotime($message->created_at))}}
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-6 p-3">
                <b> Nume: </b> {{$message->name}}
            </div>
            <div class="col-12 col-md-6 p-3">
                <b> Email: </b> {{$message->email}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-12 p-3">
                <b> Message: </b> <br/>
                {{nl2br($message->content)}}
            </div>
        </div>
    </div>
</div>
@endsection