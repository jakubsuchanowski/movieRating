<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rating;

use Session;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $movies = Movie::all();
        $movies = Movie::with('ratings')->get();
        $user=Auth::user();

        foreach($movies as $movie){
            $movie->hasRated=Rating::where('movie_id',$movie->id)
            ->where('user_id',$user->id)->exists();
        }

        return view('movies.index', compact('movies'));
        

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('movies.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated= $request->validate([
            'title'=> 'required|string|max:100',
            'movie_genre'=>'required|string|max:100',
            'director'=>'required|string|max:100',
            'year'=>'required|integer',
            'duration'=>'required|integer',
            'description'=>'required|string',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $imagePath=null;
        if($request->hasFile('image')){
            //zapisz plik do 
            $imagePath= $request->file('image')->store('movies');
        }

        $movie=new Movie();
        $movie->title=$validated['title'];
        $movie->movie_genre=$validated['movie_genre'];
        $movie->director=$validated['director'];
        $movie->year=$validated['year'];
        $movie->duration=$validated['duration'];
        $movie->description=$validated['description'];
        $movie->image_path=$imagePath;
        // dd($movie);
        $movie->save();

        Session::flash('success','Dodano nowy film');
        return redirect(route('dashboard'));
   
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
