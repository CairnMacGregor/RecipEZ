@extends('layouts.app')

@section('content')

<section id ="recipeSingle">
    @if($recipe)
    
    <div class ="recipeContainer">
        <div class ="singleInfo">
            <h2 >{{$recipe -> title}}</h2>
            <h3>{{$recipe -> likes -> count()}} {{Str::plural('Like', $recipe -> likes -> count())}}</h3>
            <a class = "foodLinkSingle" href="{{ route('users.recipes', $recipe ->user)}}">Created By {{$recipe -> user -> name}}</a><span class = "foodLinkSingle"> {{$recipe -> created_at -> diffForHumans()}}</span> 
        </div>
                <img class ="singleImg" src ="{{ url('storage/recipes/'.$recipe->file_path) }}" >
                <div class ="singleMain">
               
               
                <h3><i class="fas fa-hourglass-half"></i> {{$recipe -> prep_time }} minutes of prep time</h3>
                <h3><i class="fas fa-hourglass-half"></i> {{$recipe -> cook_time }} minutes of cook time</h3>
                <h3>Ingredients </h3>
                
              <ul id ="ingredientsList">
                @foreach (json_decode($recipe -> ingredients, true) as $key => $ingredient)
                    <li class ="singleIng"><span>Ingredient {{ ++$key}}: <br></span>{{$ingredient}}</li>
                @endforeach
            </ul>
     
            <h3>Steps</h3>
               
                <ul id ="stepsList">
                
                    @foreach (json_decode($recipe -> steps, true) as $key => $step)
                        <li  class ="singleStep"><span>Step  {{ ++$key}}: <br></span>{{$step}}</li>
                    @endforeach
                    
                </ul>
           
                <p > {{$recipe -> body}}</p>
            </div>
           
    </div>
    <div class = "buttonContainer singleButtons">
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
    @else
    <h2 class ="noOutput">Something went wrong! </h2>
@endif
</section> 
@endsection

<script > 


</script>