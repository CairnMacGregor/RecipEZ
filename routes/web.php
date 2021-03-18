<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RecipeLikeController;
use App\Http\Controllers\UserRecipeController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\RecipeFavouriteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/users/{user:username}/recipes', [UserRecipeController::class, 'index'])->name('users.recipes');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');


Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes');
Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
Route::post('/recipes', [RecipeController::class, 'store']);
Route::delete('/recipes/{recipe}', [RecipeController::class, 'destroy'])->name('recipes.destroy');



Route::post('/recipes/{recipe}/likes', [RecipeLikeController::class, 'store'])->name('recipes.likes');
Route::Delete('/recipes/{recipe}/likes', [RecipeLikeController::class, 'destroy'])->name('recipes.likes');


Route::get('/users/{recipe}/favourites', [RecipeFavouriteController::class, 'index'])->name('users.favourites');
Route::post('/users/{recipe}/favourites', [RecipeFavouriteController::class, 'store'])->name('users.favourites');
Route::Delete('/users/{recipe}/favourites', [RecipeFavouriteController::class, 'destroy']);
