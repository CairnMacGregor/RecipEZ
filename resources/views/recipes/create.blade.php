@extends('layouts.app')

@section('content')
<form action="{{route('recipes')}}" method ="post">
    @csrf
    <div>
        <label for="title">Title</label>
        <input type ="text" name ="title" id ="title" >
    
            @error('title')
            <div>{{$message}}</div>
            @enderror
    </div>

    <div>
        <label for="prep_time">Prep Time</label>
        <input type ="number" name ="prep_time" id ="prep_time">
    
            @error('prep_time')
            <div>{{$message}}</div>
            @enderror
    </div>

    <div>
        <label for="cook_time">Cook Time</label>
        <input type ="number" name ="cook_time" id ="cook_time">
    
            @error('cook_time')
            <div>{{$message}}</div>
            @enderror
    </div>
<div>
    <label for="body">Body</label>
    <textarea name ="body" id ="body" cols= "30" rows ="30" ></textarea>

        @error('body')
        <div>{{$message}}</div>
        @enderror
</div>

<div>
    <button type="submit">Post</button>
</div>
</form>
@endsection