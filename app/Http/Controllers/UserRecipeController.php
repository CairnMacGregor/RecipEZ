<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserRecipeController extends Controller
{
    public function index(User $user)
    {
        $recipes = $user->recipes()->with(['user', 'likes'])->paginate(20);

        return view('users.recipes.index', [
            'user' => $user,
            'recipes' => $recipes

        ]);
    }
}
