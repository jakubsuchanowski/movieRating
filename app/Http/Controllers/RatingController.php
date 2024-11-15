<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Movie $movie)
    {
        return view("ratings.addRating",['movie'=>$movie]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Movie $movie)
    {
        // dd($request->all());
        $validated= $request->validate([
            'rating'=>'required|integer|min:1|max:5',
        ]);

        $movie=Movie::findOrFail($movie->id);
        $user=auth()->user();

        $existingRating=Rating::where('user_id',$user->id)
        ->where('movie_id',$movie->id)->first();

        if($existingRating){
            return redirect(route('movie.index'))->with('error','Użytkownik ocenił już ten film.');
        }
        // dd($request->all());
        $rating=new Rating();
        $rating->rating=$validated['rating'];
        $rating->movie_id=$movie->id;
        $rating->user_id=auth()->id();
        $rating->save();
        return redirect(route('movie.index'))->with('success','Dodano ocene.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rating $rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rating $rating)
    {
        //
    }
}
