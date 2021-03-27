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
    <label for="ingredient">Ingredients</label>
    <input type ="text" name ="ingredient" id ="ingredient">
    <button onclick ="addIngredient()" type ="button"> Add another ingredient</button>
    <ul id ="ingredientOuput">

    </ul>
        @error('ingredient')
        <div>{{$message}}</div>
        @enderror
</div>
{{--  --}}
{{-- HIDDEN INGREDIENT DIV --}}
<div style = "display: none">
    <input type ="text" name ="ingredients" id ="ingredients">
        @error('ingredients')
        <div>{{$message}}</div>
        @enderror
</div>
{{--  --}}

{{-- STEP --}}
<div>
    <label for="step">Steps</label>
    <textarea name ="step" id ="step" cols= "30" rows ="10" ></textarea>
    <button onclick ="addStep()" type ="button"> Add another ingredient</button>
    <ul id ="stepOuput">

    </ul>
        @error('step')
        <div>{{$message}}</div>
        @enderror
</div>
{{--  --}}
{{-- HIDDEN STEPS DIV --}}
<div style = "display: none">
    <textarea name ="steps" id ="steps" cols= "30" rows ="30" ></textarea>
        @error('steps')
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
let ingredientsArr = [];
let stepsArr = [];
    const addIngredient = () =>
    {   
       
        let ingredient = document.getElementById("ingredient").value;
        let out = document.getElementById("ingredientOuput");
        let ingredients = document.getElementById("ingredients");
        if(ingredient == ""){
            alert("Please make sure this isn't empty when you submit")
        }
        else{
        ingredientsArr.push(ingredient);
        // console.log(ingredient);
        // console.log(ingredientsArr);
    
        
        document.getElementById("ingredientOuput").innerHTML += `<li> ${ingredientsArr.length}. ${ingredient} </li>`
        document.getElementById("ingredient").value = "";
        }

        let ingredientJson= JSON.stringify(ingredientsArr);
        ingredients.value = ingredientJson;

        console.log(ingredientJson)
        console.log(ingredients.value);
    }

    const addStep = () => {
        let step = document.getElementById("step").value;
        let out = document.getElementById("stepOuput");
        let steps = document.getElementById("steps");
        if(step == ""){
            alert("Please make sure this isn't empty when you submit")
        }
        else{
        stepsArr.push(step);
        document.getElementById("stepOuput").innerHTML += `<li> ${stepsArr.length}. ${step} </li>`
        document.getElementById("step").value = "";
        }

        let stepJson= JSON.stringify(stepsArr);
        // steps.value = stepsArr;
        steps.value = stepJson;

        console.log(ingredientJson)
        console.log(steps.value);
    }
</script>