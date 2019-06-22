@extends('layouts.homepage')
@section('content')
<section class="section-categories-view">
 <div class="container">
    <div class="row" id="row">
        @foreach($categories as $category)
        <div class="col-md-4 col-12 text-navi-blue pb-5">
            <div class="categories-image-circle1 mx-auto">
                <img src="/images/categories/{{$category->image}}">
            </div>
            <h3 class="categories-name text-center font-lobster pt-2">{{$category->name}}</h3>
        </div>
        @endforeach
    </div>
    <a href="" class="btn btn-start btn-more">More</a>
 </div>
</section>

@endsection
@section('bottomscripts')
<script>
    window.current_page = 1;
    $('.btn-more').on('click', function(e){
        e.preventDefault();
        window.current_page++;
        $.ajax({
            url:'/categories/paginate?page='+window.current_page,
            data: '',
            method: 'get',
            dataType: 'json',
            success: function(response){
                for(var i = 0; i<response.data.length; i++){
                    $('#row').append
                    ('<div class="col-md-4 col-12 text-navi-blue pb-5">'+
                        '<div class="categories-image-circle1 mx-auto">'+
                            '<img src="/images/categories/'+response.data[i].image+'">'+
                        '</div>'+
                        '<h3 class="categories-name text-center font-lobster pt-2">'+response.data[i].name+'</h3>'+
                    '</div>');
                }
               

            }
        })
    })
</script>
@endsection