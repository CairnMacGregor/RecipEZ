<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
        return redirect('/login');
    }
    public function index()
    {
        $recipes = Recipe::latest()->with(['user', 'likes'])->paginate(20);

        return view('recipes.index', [
            'recipes' => $recipes
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'prep_time' => 'required',
            'cook_time' => 'required',
            'body' => 'required',

        ]);
        $request->user()->recipes()->create([
            'title' => $request->title,
            'prep_time' => $request->prep_time,
            'cook_time' => $request->cook_time,
            'body' => $request->body
        ]);
        $recipes = Recipe::latest()->with(['user', 'likes'])->paginate(20);
        return view('recipes.index', [
            'recipes' => $recipes
        ]);
    }

    public function create()
    {
        return view('recipes.create');
    }

    public function destroy(Recipe $recipe)
    {
        $this->authorize('delete', $recipe);
        $recipe->delete();
        return back();
    }
}
