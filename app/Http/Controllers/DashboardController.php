<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Favourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // $userFavs = Auth::user()->favourites;
    // DD USERFAVS SHOWS THAT YOU ARE GETTING THE FAVOURITES ID, THE USER ID AND THE RECIPE ID
    // NEED TO WORKOUT HOW TO EXTRACT THE RECIPE FROM THE FAVOURITES TABLE WHERE USER === CURRENT USER

    // $userFavs = Auth::user()->recipes;
    // SHOWS THE RECIPES CREATED BY THE CURRENT LOGGED IN USER

    public function __construct()
    {
        $this->middleware(['auth']);
        return redirect('/login');
    }
    public function index()
    {
        // $userFavs = Auth::user()->id;
        // $testData = Recipe::latest()->with(['favourites'])->paginate(20);
        // $extraInfo = Auth::user()->favourites[0]->recipe_id;
        $extraInfo = Auth::user()->favourites->count();
        // $arrayIn = Recipe::find(Auth::user()->favourites[1]->recipe_id)->with(['user', 'likes']);
        // dd($arrayIn);
        for ($i = 0; $i < $extraInfo; $i++) {
            $arrayIn = Recipe::find(Auth::user()->favourites[$i]->recipe_id);
            $outPut[] = $arrayIn;
        }

        // dd($testData, $userFavs, $extraInfo);
        // dd($userFavs);
        // $favourites = Favourite::latest();
        return view('dashboard', [
            'userFavs' => $outPut,
            // 'favourites' => $favourites
        ]);
    }
}
