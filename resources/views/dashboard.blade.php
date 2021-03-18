@extends('layouts.app')

@section('content')
    Dashboard
    USERFAV
    @foreach($userFavs as $userFav)
    <div>
       
       
        {{$userFav}}

      
    </div>
    @endforeach
   
@endsection