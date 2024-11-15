<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavouriteMovieController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatingController;
use App\Models\FavouriteMovie;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/movie/favourites', [FavouriteMovieController::class, 'showFavourites'])->name('favourites.show');
Route::post('/movie/{id}/favourite', [FavouriteMovieController::class, 'addFavourite'])->name('favourites.add');
Route::resource('/movie',MovieController::class);
// Route::get('movie/create',[MovieController::class,'create'])->name('movie.create');
// Route::post('movie/create',[MovieController::class,'store'])->name('movie.store');
// Route::resource('/rating', RatingController::class);

Route::get('/movie/{movie}/rate',[RatingController::class,'create'])->name('rate.create');
Route::post('/movie/{movie}/rate',[RatingController::class,'store'])->name('rate.store');

Route::get('/movie/{id}/comments/show', [CommentController::class,'show'])->name('comments.show');
Route::post('/movie/{id}/comments/add',[CommentController::class,'store'])->name('comments.store');
Route::get('/movie/{id}/comments/add', [CommentController::class,'create'])->name('comments.create');

require __DIR__.'/auth.php';
