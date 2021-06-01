<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\Movie;

class MoviesController extends Controller
{

    public function index(){


        return Http::get('https://api.themoviedb.org/3/movie/popular?api_key=d37692672a76f1c72bfdfcdd29a32768')
        ->json()['results'];

    }

}
