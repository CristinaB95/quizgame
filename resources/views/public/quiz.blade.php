@extends('layouts.homepage')
@section('content')
<section class="pages-front-height d-flex align-items-center">
    <div class="container pb-5">
        <form method="post" action="/categories/{{$category->id}}/quiz-submit">
        @csrf
            @foreach($questions as $key=>$question)
            <input type="hidden" name="questions_show[{{$question->id}}]">
            <div class="card d-none" id="q-{{$key}}">
                <div class="pt-3 px-3 text-navi-blue">
                    <h4 class="font-lobster">{{$question->content}}</h4>
                </div>
                <div class="card-body font-josefin">
                    @foreach($question->answers as $answer)
                        @if($answer->status == 1)
                            <div class="form-check radio-toolbar">
                                <input class="form-check-input d-none " type="radio" name="questions[{{$question->id}}]" id="answer-{{$answer->id}}" value="{{$answer->id}}">
                                <label class="form-check-label pb-2" for="answer-{{$answer->id}}">
                                    {{$answer->content}}
                                </label>
                            </div>  
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach
            <div class="buttons-quiz d-flex justify-content-between font-lobster ">
                <a href="" id="prev" class="btn-start btn-quiz text-center rounded text-navi-bluept-1 mt-3"> 
                    <!-- <i class="fas fa-chevron-left"></i> -->
                    Prev
                 </a>
                <a href="" id="next" class="btn-start btn-quiz text-center text-navi-blue rounded pt-1 mt-3">
                     <!-- <i class="fas fa-chevron-right"></i> -->
                    Next
                </a>
                <button class="d-none btn btn-start mt-3" id="finish-quiz-button" type="submit">Finish</button>
            </div>
        </form>
    </div>
</section>
@endsection
@section('bottomscripts')
<script>
    var contor = 0;
    var number_questions = {{count($questions)}};
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