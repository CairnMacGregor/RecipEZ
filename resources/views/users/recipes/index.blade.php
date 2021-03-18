@extends('layouts.app')

@section('content')
    {{$user -> name}}
    @foreach($recipes as $recipe)
            <div>
                <a href="{{ route('users.recipes', $recipe ->user)}}">{{$recipe -> user -> name}}</a><span>{{$recipe -> created_at -> diffForHumans()}}</span>
                <p>{{$recipe ->title}}</p>
                <p>{{$recipe ->body}}</p>

              
                @can('delete', $recipe)
                    <form action="{{route('recipes.destroy', $recipe)}}" method ="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                @endcan
                
                <div>
                    @auth
                        @if(!$recipe -> likedBy(auth()->user()))
                        <form action="{{route('recipes.likes' , $recipe)}}" method = "post">
                            @csrf
                            <button type="submit">Like</button>
                            </form>
                        
                        @else
                        <form action="{{route('recipes.likes' , $recipe)}}" method = "post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Unlike</button>
                        </form>
                    
                    @endif
                   
                    
                @endauth
                    <span>{{$recipe -> likes -> count()}} {{Str::plural('Like', $recipe -> likes -> count())}}</span>
                </div>
                {{-- FAVS --}}

                <div>
                    @if(!$recipe -> favouritedBy(auth()->user()))
                    <form action="{{route('users.favourites', $recipe)}}" method ="post">
                        @csrf
                        <button type="submit">Fav</button>
                    </form>
                    @else
                    <form action="{{route('users.favourites' , $recipe)}}" method = "post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">UnFav</button>
                    </form>
                
                @endif
                </div>

            </div>
            @endforeach
@endsection
