@extends('layouts.homepage')
@section('content')
<section class="profile-page pages-front-height d-flex align-items-center">
    <div class="container">
        <h1 class="text-center pb-4 text-navi-blue font-lobster"> Welcome {{$user->username}} !</h1>
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
                        <form action="/editpassword" method="POST">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="new_password" class="font-lobster text-navi-blue">New Password</label>
                                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New password">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="re_new_password" class="font-lobster text-navi-blue">Confirm new password</label>
                                    <input type="password" class="form-control" id="re_new_password" name="re_new_password" placeholder="Confirm new password">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="old_password" class="font-lobster text-navi-blue">Old password</label>
                                    <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Old password">
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
