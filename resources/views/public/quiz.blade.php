@extends('layouts.homepage')
@section('content')
<section class="pages-front-height d-flex align-items-center">
    <div class="container pb-5">
        <form method="post" action="/categories/{{$category->id}}/quiz-submit">
        @csrf
            @foreach($questions as $key=>$question)
            <div class="card d-none" id="q-{{$key}}">
                <div class="card-header">
                    {{$question->content}}
                </div>
                <div class="card-body">
                    @foreach($question->answers as $answer)
                        @if($answer->status == 1)
                            <div class="form-check radio-toolbar">
                                <input class="form-check-input d-none " type="radio" name="questions[{{$question->id}}]" id="answer-{{$answer->id}}" value="{{$answer->id}}">
                                <label class="form-check-label" for="answer-{{$answer->id}}">
                                    {{$answer->content}}
                                </label>
                            </div>  
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach
            <div class="buttons-quiz d-flex justify-content-between font-lobster">
                <a href="" id="prev" class="btn-start btn-quiz text-center rounded mt-3"> 
                    <!-- <i class="fas fa-chevron-left"></i> -->
                    Prev
                 </a>
                <a href="" id="next" class="btn-start btn-quiz text-center rounded mt-3">
                     <!-- <i class="fas fa-chevron-right"></i> -->
                    Next
                </a>
                <button class="d-none btn btn-start" id="finish-quiz-button" type="submit">Finish</button>
            </div>
        </form>
    </div>
</section>
@endsection
@section('bottomscripts')
<script>
    var contor = 0;
    var number_questions = {{count($category->questions)}};
    // afisam prima intrebare 
    $('#q-'+contor).removeClass('d-none');

    // ascundem butonul de prev
    if(contor == 0){
            $('#prev').addClass('invisible');
        }
    $('#next').on('click', function(e){
        e.preventDefault();
        $('#q-'+contor).addClass('d-none');
        contor++;
        if(contor == 1){
            $('#prev').removeClass('invisible');
        }
        $('#q-'+contor).removeClass('d-none');
        if(contor == number_questions-1){
            $('#next').addClass('d-none');
            $('#finish-quiz-button').removeClass('d-none');
        }
    })
    $('#prev').on('click', function(e){
        e.preventDefault();
        $('#q-'+contor).addClass('d-none');
        contor--;
        $('#q-'+contor).removeClass('d-none');
        if(contor == 0){
            $('#prev').addClass('invisible');
        }
        if(contor == number_questions-2){
            $('#next').removeClass('d-none');
            $('#finish-quiz-button').addClass('d-none');
        }
    })

</script>
@endsection