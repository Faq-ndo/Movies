<?php

namespace App\Http\Controllers;

use App\Movie;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    //

    public function getMovies(){
        $movies = DB::table('movies')->paginate(20);
        return view('movies.catalog', ['movies' => $movies]);
    }

    public function getMovieById($id){
        $movie = Movie::find($id);
        return view('movies.details', ['movie' => $movie]);
    }

    public function likeMovie($id){
        $movie = Auth::user()->movies()->find($id);
        $msg = 'You arlready liked this movie';
        if(!$movie){
            DB::Table('movies_users')->insert(['user_id' => Auth::id(), 'movie_id' => $id]);
            $msg = 'Movie Saved!';
        }
        return redirect("/movie/$id")->with('message', $msg);
    }

    public function getLikedMovies(){
        $user = User::find(Auth::id());
        return view('movies.liked', ['movies' => $user->movies()->paginate(20)]);
    }

    public function getTopMovies(){
        $movies = Movie::where('vote_average', '>=', 7)->paginate(20);
        return view('movies.liked', ['movies' => $movies]);
    }
}
