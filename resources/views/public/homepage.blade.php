@extends('layouts.homepage')
@section('content')
<section class="section-1">
    <div class="jumbotron d-flex">
        <div class="clip-art">
        </div>
        <div class="image-jumbotron align-self-center">
                <img src="/images/front/background.png" alt=""> 
        </div>
        <div class="text-section-1 align-self-center">
            <h1 class="font-lobster">Best quiz ever</h1>
            <p class="font-josefin"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras hendrerit nisl quis justo sagittis malesuada. Ut et dui ac est feugiat sodales et id nisi. In viverra in purus et viverra. </p>
            @guest
                <a class="btn btn-start font-lobster px-4" href="{{ route('login') }}"> Start </a>
            @else
                <a class="btn btn-start font-lobster px-4" href="{{ route('categories') }}"> Start </a>
            @endguest
        </div>
    </div>
</section>
<section class="section-2 font-lobster text-navi-blue" id="overview">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-4 col-12 text-center">
                <div class="section-2-circle mx-auto d-flex align-items-center" id="categories-circle">
                    <div class="font-size-bigger mx-auto ">{{count($categories)}}</div>
                </div>
                <h2>Categories</h2>
            </div>
            <div class="col-md-4 col-12 text-center">
                <div class="section-2-circle mx-auto d-flex align-items-center" id="questions-circle">
                    <div class="font-size-bigger mx-auto ">{{count($questions)}}</div>
                </div>
                <h2>Questions</h2>
            </div>
            <div class="col-md-4 col-12 text-center">
                <div class="section-2-circle mx-auto d-flex align-items-center" id="users-circle">
                    <div class="font-size-bigger mx-auto ">{{count($users)}}</div>
                </div>
                <h2>Users</h2>
            </div>
        </div>
    </div>
</section>
<section class="section-3 text-navi-blue">
    <div class="container">
        <div class="text-center section-3-container mx-auto font-lobster">
            <div class="section-3-items mx-auto">
                <h2 class="text-uppercase "> Start your adventure now </h2>
                @guest
                    <a href="{{ route('login') }}" class="btn btn-start text-navi-blue mt-2 font-size-bigger" >Let's go!</a>
                @else
                    <a href="{{ route('categories') }}" class="btn btn-start text-navi-blue mt-2 font-size-bigger" >Let's go!</a>
                @endguest
            </div>
        </div>
    </div>
</section>

@endsection