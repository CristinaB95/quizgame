@extends('layouts.homepage')
@section('content')
<section class="section-categories pages-front-height d-flex align-items-center">
 <div class="container text-center font-lobster text-navi-blue">
     <h1 class="pb-5"> Select category </h1>
    <div class="row" id="row">
        @foreach($categories as $category)
        <a href="/categories/{{$category->id}}/quiz" class="category-view col-md-4 col-12 pb-5 text-navi-blue">
            <div>
                <div class="categories-image-circle1 mx-auto">
                    <img src="/images/categories/{{$category->image}}">
                </div>
                <h3 class="pt-2">{{$category->name}}</h3>
            </div>
        </a>
        @endforeach
    </div>
    <a href="" class="btn btn-start btn-more font-lobster text-navi-blue font-size-bigger" id="btn-more">More</a>
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
                    ('  <a href="/categories/'+response.data[i].id+'" class="col-md-4 col-12 text-navi-blue pb-5">'+
                        '<div>'+
                        '<div class="categories-image-circle1 mx-auto">'+
                            '<img src="/images/categories/'+response.data[i].image+'">'+
                        '</div>'+
                        '<h3 class="categories-name text-center font-lobster pt-2">'+response.data[i].name+'</h3>'+
                    '</div></a>');
                }
                if(response.current_page == response.last_page){
                    $('#btn-more').addClass('d-none');
                }
            }
        })
    })
</script>
@endsection