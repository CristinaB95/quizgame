@extends('layouts.homepage')
@section('content')
    <section class="pages-front-height pb-100 d-flex align-items-center">
        <div class="container mx-auto">
            <div class="contact-page-items mx-auto">
                <h1 class="text-center text-navi-blue font-lobster mb-5"> Contact us! </h1>
                    @if($errors->any())
                        <div class="alert alert-danger mx-auto text-center alert-message">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                <form class="contact-page-form mx-auto" action="/contact-page" method="POST">
                @csrf
                    <div class="form-row">
                        <div class="col-md-6 col-12 mb-3 pr-sm-0 pr-md-4">
                            <label for="name" class="font-lobster text-navi-blue">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Name" value="{{old('name')}}" name="name" required>
                        </div>
                        <div class="col-md-6 col-12 mb-3 pr-sm-0 pr-md-4">
                            <label for="email" class="font-lobster text-navi-blue">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" value="{{old('email')}}" name="email" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12 pr-sm-0 pr-md-4">
                            <label for="message" class="font-lobster text-navi-blue">Message:</label>
                            <textarea class="form-control " id="message" name="message" rows="5" placeholder="Enter your message"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-start font-lobster text-navi-blue">Send!</button>
                </form>
            </div>
        </div>
    </section>
@endsection