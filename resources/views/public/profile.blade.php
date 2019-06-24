@extends('layouts.homepage')
@section('content')
<section class="profile-page pages-front-height d-flex align-items-center">
    <div class="container">
        <h1 class="text-center pb-4"> Hi {{$user->username}}</h1>
        <div class="profile-page-items d-flex justify-content-center">
            <div class="col-md-2">
                <ul class="nav flex-column my-3">
                    <li class="nav-item">
                        <a class="nav-link active" href="/profile">Profile info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/change-password">Change Password</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/delete-account">Delete Account</a>
                    </li>
                </ul>
            </div>  
            <div class="col-md-6">
                <div class="mb-3">
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
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{$user->first_name}}" placeholder="First name">
                                </div>
                                <div class="form-group col-6">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{$user->last_name}}" placeholder="First name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" value="{{$user->username}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
                                </div>
                            </div>
                            <div clas="row">
                                <div class="form-group col-6">
                                    <button type="submit" class="btn btn-start">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection