<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Comment;

class CommentController extends Controller
{

    public function show($movieId){
        $comments=Comment::where('movie_id',$movieId)->get();
        $movie=Movie::find($movieId);
        return view("comments.index",compact("comments"),['movie'=>$movie]);
    }
    public function create($movieId){
        $movie=Movie::find($movieId);
        return view("comments.create",['movie'=>$movie]);
    }
    public function store(Request $request, $movieId){
        $validated=$request->validate([
            'comment'=>'required|string|max:1000',
        ]);

        $movie=Movie::findOrFail($movieId);
        $user=auth()->user();
        $comment=new Comment();
        $comment->comment=$validated['comment'];
        $comment->user_id=$user->id;
        $comment->movie_id=$movieId;
        $comment->save();
        return redirect(route('comments.show',['id'=>$movieId]))->with('success','Komentarz został dodany');
    }
}
