@extends('layouts.app')

@section('content')

<section id ="dashboard">
    @if($userFavs)
    
    <div class ="foodCardGrid">

        @foreach($userFavs as $userFav)
        <div class="foodCard" onclick ="location.href ='{{route('recipes.show', $userFav)}}'">
           
                <img src ="{{ url('storage/recipes/'.$userFav->file_path) }}" class = "food_card_image">
                <div class = "imageOverlay">
                <h2 class="foodTitle foodCardItem">{{$userFav -> title}}</h2>
               
                <h3 class="cookTime foodCardItem"><i class="fas fa-hourglass-half"></i> {{$userFav -> prep_time +  $userFav -> cook_time}} minutes total time</h3>
                <h3>{{count(json_decode($userFav -> ingredients, true))}} Ingredients </h3>
                
              {{-- <ul class = "foodIngredientList">
                @foreach (json_decode($userFav -> ingredients, true) as $ingredient)
                    <li class = "foodIngredientItem">{{$ingredient}}</li>
                @endforeach
            </ul> --}}
            <h3>{{count(json_decode($userFav -> steps, true))}} Steps</h3>
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