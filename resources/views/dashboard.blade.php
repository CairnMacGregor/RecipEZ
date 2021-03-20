@extends('layouts.app')

@section('content')

<section id ="dashboard">
    @if($userFavs)
    
    <div class ="foodCardGrid">
        
        @foreach($userFavs as $userFav)
        <div class="foodCard">
          
                <img src ="{{ url('storage/recipes/'.$userFav->file_path) }}" class = "food_card_image">
                <div class = "imageOverlay">
                <h2 class="foodTitle foodCardItem">{{$userFav -> title}}</h2>
                <p class="cookTime foodCardItem"><i class="fas fa-hourglass-half"></i> {{$userFav -> prep_time +  $userFav -> cook_time}}</p>
                <p class="body foodCardItem"> {{substr($userFav -> body, 0, 100)}}...</p>
            </div>
        </div>
       @endforeach
    </div>
    

    @else
    <h2 class  = "noOutput">You have not favourited any recipes, check out the latest <a href ="{{route('recipes')}}">here</a></h2>
    @endif
</section> 
@endsection