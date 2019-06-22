@extends('layouts.homepage')
@section('content')
<div class="container pb-5">
    <form method="post" action="/categories/{{$category->id}}/quiz-submit">
    @csrf
        @foreach($category->questions as $key=>$question)
        <div class="card d-none" id="q-{{$key}}">
            <div class="card-header">
                {{$question->content}}
            </div>
            <div class="card-body">
                @foreach($question->answers as $answer)
                    <div class="form-check">
                        <input class="form-check-input " type="radio" name="questions[{{$question->id}}]" id="exampleRadios1" value="{{$answer->id}}">
                        <label class="form-check-label" for="exampleRadios1">
                            {{$answer->content}}
                        </label>
                    </div>  
                @endforeach
            </div>
        </div>
    @endforeach
        <div class="buttons-quiz d-flex justify-content-between">
            <a href="" id="prev"> <i class="fas fa-chevron-left"></i> </a>
            <a href="" id="next"> <i class="fas fa-chevron-right"></i> </a>
            <button class="d-none btn btn-start" id="finish-quiz-button" type="submit">Finish</button>
        </div>
    </form>
</div>
@endsection
@section('bottomscripts')
<script>
    var contor = 0;
    var number_questions = {{count($category->questions)}};
    // afisam prima intrebare 
    $('#q-'+contor).removeClass('d-none');

    // ascundem butonul de prev
    if(contor == 0){
            $('#prev').addClass('d-none');
        }
    $('#next').on('click', function(e){
        e.preventDefault();
        $('#q-'+contor).addClass('d-none');
        contor++;
        if(contor == 1){
            $('#prev').removeClass('d-none');
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
            $('#prev').addClass('d-none');
        }
        if(contor == number_questions-2){
            $('#next').removeClass('d-none');
            $('#finish-quiz-button').addClass('d-none');
        }
    })

</script>
@endsection