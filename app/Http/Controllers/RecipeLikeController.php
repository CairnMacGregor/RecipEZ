<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeLikeController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
        return redirect('/login');
    }
    public function store(Recipe $recipe, Request $request)
    {
        if ($recipe->likedBy($request->user())) {
            return back();
        }

        $recipe->likes()->create([
            'user_id' => $request->user()->id,
        ]);

        return back();
    }

    public function destroy(Recipe $recipe, Request $request)
    {
        $request->user()->likes()->where('recipe_id', $recipe->id)->delete();
        return back();
    }
}
