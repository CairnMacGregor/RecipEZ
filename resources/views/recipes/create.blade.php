@extends('layouts.app')

@section('content')
<form action="{{route('recipes')}}" method ="post" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="title">Title</label>
        <input type ="text" name ="title" id ="title" >
    
            @error('title')
            <div>{{$message}}</div>
            @enderror
    </div>


    <div>
        <label for="file">Image</label>
        <input type ="file" name ="file" id ="file" >
    
            @error('file')
            <div>{{$message}}</div>
            @enderror
    </div>

{{-- INGREDIENTS --}}
<div>
    <label for="ingredients">Ingredients</label>
    <input type ="text" name ="ingredient" id ="ingredient" >
    <button onclick ="addInput()" type ="button"> Add another ingredient</button>
    <ul id ="ingredientOuput">

    </ul>
        @error('file')
        <div>{{$message}}</div>
        @enderror
</div>
{{--  --}}
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

<script>
let ingredients = [];
    const addInput = () =>
    {   
       
        let ingredient = document.getElementById("ingredient").value;
        let out = document.getElementById("ingredientOuput");
        if(ingredient == ""){
            alert("Please make sure this isn't empty when you submit")
        }
        else{
        ingredients.push(ingredient);
        console.log(ingredient);
        console.log(ingredients);
    
        
        document.getElementById("ingredientOuput").innerHTML += `<li> ${ingredient} </li>`
        document.getElementById("ingredient").value = "";
        }
    }

</script>