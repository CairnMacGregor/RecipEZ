@extends('layouts.app')

@section('content')

<section id ="dashboard">
    
    
    <div class ="foodCardGrid">
        @foreach($userFavs as $userFav)
       <div class="foodCard">
           Food image will go in as the full background, for now it's just black
           <h2 class="title foodCardItem">{{$userFav -> title}}</h2>
           <p class="cookTime foodCardItem"><i class="fas fa-hourglass-half"></i> {{$userFav -> prep_time +  $userFav -> cook_time}}</p>
       </div>
       
       @endforeach
    </div>

</section> 
@endsection