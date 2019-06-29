@extends('layouts.homepage')
@section('content')
<section class="profile-page pages-front-height d-flex align-items-center border rounded">
    <div class="container">
        <h1 class="text-center pb-2 pt-4 text-navi-blue font-lobster"> Welcome {{$user->username}} !</h1>
        <h4 class="text-center pb-4 text-navi-blue font-lobster"> You have points {{$user->score}} </h4>
        <div class="profile-page-items mx-auto d-flex justify-content-center">
            @include('partials/navbar_user')
            <div class="col-md-8">
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
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                 {{ session()->get('message') }}
                            </div>
                        @endif
                        <form action="/profile" method="POST" class="profile-page-form">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="first_name" class="font-lobster text-navi-blue">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" value="{{$user->first_name}}" placeholder="First name">
                                </div>
                                <div class="form-group col-6">
                                    <label for="last_name" class="font-lobster text-navi-blue">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" value="{{$user->last_name}}" placeholder="Last name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="username" class="font-lobster text-navi-blue">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" value="{{$user->username}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="email" class="font-lobster text-navi-blue">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
                                </div>
                            </div>
                            <div clas="row">
                                <div class="form-group col-6">
                                    <button type="submit" class="font-lobster text-navi-blue btn btn-start">Submit</button>
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