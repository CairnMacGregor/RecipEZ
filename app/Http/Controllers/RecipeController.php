<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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

    public function show(Recipe $recipe)
    {
        return view('recipes.show', [
            'recipe' => $recipe
        ]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'prep_time' => 'required',
            'cook_time' => 'required',
            'body' => 'required',
            'ingredients' => 'required',
            'steps' => 'required'
        ]);

        if ($request->hasFile('file')) {

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            // Save the file locally in the storage/public/ folder under a new folder named /product
            $request->file->store('recipes', 'public');

            // Store the record, using the new file hashname which will be it's new filename identity.
            $request->user()->recipes()->create([
                'title' => $request->title,
                'prep_time' => $request->prep_time,
                'cook_time' => $request->cook_time,
                'body' => $request->body,
                "file_path" => $request->file->hashName(),
                'ingredients' => $request->ingredients,
                'steps' => $request->steps
            ]);
        }

        $recipes = Recipe::latest()->with(['user', 'likes'])->paginate(20);
        return view('recipes.index', [
            'recipes' => $recipes
        ]);

        // 
        $request->user()->recipes()->create([
            'title' => $request->title,
            'prep_time' => $request->prep_time,
            'cook_time' => $request->cook_time,
            'body' => $request->body,
            'ingredients' => $request->ingredients,
            'steps' => $request->steps
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
        $file_path = app_path() . '../../public/storage/recipes/' . $recipe->file_path;
        $this->authorize('delete', $recipe);
        unlink($file_path);
        $recipe->delete();

        return back();
    }
}
