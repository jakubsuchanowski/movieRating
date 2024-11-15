<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FavouriteMovie;
use App\Models\Movie;
use Illuminate\Http\Request;
class FavouriteMovieController extends Controller
{
    //
    public function addFavourite($movieId){
        // $movie = Movie::findOrFail($movieId);
        $user= auth()->user();
        if($user->favourites()->where('movie_id', $movieId)->exists()){
            $user->favourites()->detach($movieId);
            }else {
                $user->favourites()->attach($movieId);
            }
            return redirect()->back();
    }

    public function showFavourites(){
        $user= auth()->user();
        $movies=$user->favourites;
        
        // dd($user);
        // $movies=FavouriteMovie::where('user_id', $user->id)->with('movie_id')->get();
        // dd($movies);
        return view('movies.favourites', compact('movies'));
    }
}
