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
        $extraInfo = Auth::user()->favourites->count();
        if ($extraInfo > 0) {
            for ($i = 0; $i < $extraInfo; $i++) {
                $arrayIn = Recipe::find(Auth::user()->favourites[$i]->recipe_id);
                $outPut[] = $arrayIn;
                // dd($outPut);
            }
            return view('dashboard', [

                'userFavs' => $outPut

            ]);
        } else {
            return view('dashboard', [
                'userFavs' => 0,
            ]);
        }
    }
}
