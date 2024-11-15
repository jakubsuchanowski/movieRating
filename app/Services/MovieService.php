<?php
namespace App\Services;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class MovieService{
    private $baseUrl;
    private $apiKey;

    public function __construct(){
        $this->baseUrl = 'https://api.themoviedb.org/3/';
        $this->apiKey = env('TMDB_API_KEY');
    }

    public function searchMovies($query){
        $response = Http::get("{$this->baseUrl}/ search/movie",[
            'query'=> [
                'api_key'=>$this->apiKey,
                'query'=> $query,
            ]
            ]);
    }
}

?>