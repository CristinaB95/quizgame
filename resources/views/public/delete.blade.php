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
                        <p class="font-josefin pb-2 text-navi-blue">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <form action="/deleteaccount" method="POST">
                            {{csrf_field()}}
                            {{method_field('delete')}}
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="password" class="font-lobster text-navi-blue">Enter Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                </div>
                            </div>
                            <div clas="row">
                                <div class="form-group col-6">
                                    <button type="submit" class="mt-3 font-lobster text-navi-blue btn btn-start">Delete account</button>
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
