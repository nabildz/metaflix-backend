<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\Movie;
use App\Http\Requests\MovieRequest;

class MoviesController extends Controller
{


    public function index()
    {

        $movies = Http::get('https://api.themoviedb.org/3/movie/popular?api_key=d37692672a76f1c72bfdfcdd29a32768')
            ->json()['results'];

        return response()->json(["data" => $movies], 200);
    }


    public function getWatchedList()
    {

        $movies = Movie::where('status', 'is_watched')->latest()->get();

        return response()->json(["data" => $movies], 200);
    }



    public function getWishList()
    {

        $movies = Movie::where('status', 'in_wishlist')->get();

        return response()->json(["data" => $movies], 200);
    }



    public function store(MovieRequest $request)
    {

        $movie = Movie::create(
            $request->only('tmbd_id', 'tmbd_vote_average', 'language', 'title', 'image_url', 'release_date','status')
        );

        $message = $movie->status === 'is_watched' ? 'watched list' : 'wish list';

        return response()->json(["message" => "Added to ${message}"], 201);
    }


    public function show($id)
    {


        $movie = Movie::find($id);
    }


    public function update(MovieRequest $request)
    {

        $movie = Movie::findorfail($request->id);

        $movie->update(
            $request->only('rating', 'review')
        );

        return response()->json(["message" => $movie], 200);
    }


    public function destroy(Request $request)
    {

        $movie = Movie::findorfail($request->id);

        $movie->delete();

        return response()->json(["message" => "Removed from the list"], 200);
    }
}
