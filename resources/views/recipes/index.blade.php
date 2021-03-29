@extends('layouts.app')

@section('content')      
           <section id = "recipes">
                 <a class  = "noOutput" href ="{{route('recipes.create')}}">Add a new recipe</a>
            @if($recipes -> count())
                <div class ="foodCardGrid">
                    @foreach($recipes as $recipe)
                    
                        <div class="foodCard" onclick ="location.href ='{{route('recipes.show', $recipe)}}'">
                            
                            <img src ="{{ url('storage/recipes/'.$recipe->file_path) }}" class = "food_card_image">
                                <div class = "imageOverlay">
                                <h2 class="foodTitle foodCardItem">{{$recipe -> title}}</h2>
                                <h3 class="cookTime foodCardItem"><i class="fas fa-hourglass-half"></i> {{$recipe -> prep_time +  $recipe -> cook_time}} minutes total time</h3>
                                <h3>{{count(json_decode($recipe -> ingredients, true))}} Ingredients </h3>
                
                                    {{-- <ul class = "foodIngredientList">
                                        @foreach (json_decode($recipe -> ingredients, true) as $ingredient)
                                            <li class = "foodIngredientItem">{{$ingredient}}</li>
                                        @endforeach
                                    </ul> --}}
                                <h3>{{count(json_decode($recipe -> steps, true))}} Steps</h3>
                                <p class="body foodCardItem"> {{substr($recipe -> body, 0, 100)}}...</p>
                                <div class = "buttonContainer">
                                    @can('delete', $recipe)
                                        <form action="{{route('recipes.destroy', $recipe)}}" method ="post">
                                            @csrf
                                            @method('DELETE')
                                                <button type="submit"><i class="far fa-trash-alt"></i></button>
                                        </form>
                                    @endcan
                                    <div>
                                        @auth
                                            @if(!$recipe -> likedBy(auth()->user()))
                                                <form action="{{route('recipes.likes' , $recipe)}}" method = "post">
                                                    @csrf
                                                    <button type="submit"><i class="far fa-thumbs-up"></i></button>
                                                    </form>
                                                
                                                @else
                                                <form action="{{route('recipes.likes' , $recipe)}}" method = "post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"><i class="fas fa-thumbs-up"></i></button>
                                                </form>
                                            @endif
                                        @endauth
                                    </div>
                                    <div>
                                        @if(!$recipe -> favouritedBy(auth()->user()))
                                            <form action="{{route('users.favourites', $recipe)}}" method ="post">
                                                @csrf
                                                <button type="submit"><i class="far fa-heart"></i></button>
                                            </form>
                                            @else
                                            <form action="{{route('users.favourites' , $recipe)}}" method = "post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"><i class="fas fa-heart"></i></button>
                                            </form>
                                        @endif
                                    </div>
                                
                                </div>
                                    <span>{{$recipe -> likes -> count()}} {{Str::plural('Like', $recipe -> likes -> count())}}</span>
                                    <a class = "foodLink" href="{{ route('users.recipes', $recipe ->user)}}">Created By {{$recipe -> user -> name}}</a><span> {{$recipe -> created_at -> diffForHumans()}}</span>                        </div>
                    </div>
            @endforeach
        </section>
            {{$recipes -> links()}}
            @else
            <h2 class ="noOutput">There are no recipes </h2>
            @endif
     
@endsection