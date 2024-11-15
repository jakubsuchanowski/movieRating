<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    /** @use HasFactory<\Database\Factories\MovieFactory> */
    use HasFactory;

    protected $fillable = [
        "title",
        "movie_genre",
        "director",
        "image_path",
        "year",
        "duration",
        "description",
    ];

    public function ratings(){
        return $this->hasMany(Rating::class);
    }
    public function averageRating(){
        return $this->ratings()->avg('rating');
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function user()
    {
        return $this->belongsToMany(User::class, 'favourites')->withTimestamps();
    }
}
