<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeFavouriteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }


    public function store(Recipe $recipe, Request $request)
    {
        if ($recipe->favouritedBy($request->user())) {
            return back();
        }

        $recipe->favourites()->create([
            'user_id' => $request->user()->id,
        ]);

        return back();
    }

    public function destroy(Recipe $recipe, Request $request)
    {
        $request->user()->favourites()->where('recipe_id', $recipe->id)->delete();
        return back();
    }
}
