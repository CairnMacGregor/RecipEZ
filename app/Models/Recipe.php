<?php

namespace App\Models;

use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'file_path',
        'prep_time',
        'cook_time',
        'body',
        'ingredients',
        'steps'
    ];
    // protected $casts = [
    //     'ingredients' => 'array',
    //     'steps' => 'array'
    // ];
    public function likedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }

    public function favouritedBy(User $user)
    {
        return $this->favourites->contains('user_id', $user->id);
    }


    public function user()
    {
        return $this->belongsTo((User::class));
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function favourites()
    {
        return $this->hasMany(Favourite::class);
    }
}
