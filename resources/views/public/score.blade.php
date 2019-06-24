@extends('layouts.homepage')
@section('content')
<section class="score-page pages-front-height align-items-center">
    <div class="container ">
        <div class="score-page-container mx-auto text-center">
            <div class="score-page-items text-navi-blue">
                <div class="score-description">
                    @if($number_of_correct_answers <= 2)
                        <h2 class="font-lobster pb-2 text-navi-blue"> {{$title_bad_score}}</h2>
                        <p> {{$description_bad_score}}</p>
                    @else
                        <h2 class="font-lobster pb-2 text-navi-blue"> {{$title_good_score}}</h2>
                        <p> {{$description_good_score}}</p>
                    @endif
                </div>
                <div class="show-corect-answers">
                    <p> You answer correct to: <span class="font-weight-bold corect-answers"> {{$number_of_correct_answers}} / {{$number_of_questions}}</span> </p>
                </div>
                <div class="show-score">
                    <h3 class="font-lobster text-navi-blue"> Your score is: <span> {{$score_quiz}} </span></h3>
                    <span> </span>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection