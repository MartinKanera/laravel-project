<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CD;
use App\Genre;
use Illuminate\Support\Facades\DB;

class GenresController extends Controller
{
    public function index () {
      $genres = Genre::all();

      return view('genres.index', compact('genres'));
    }

    public function destroy (Genre $genre) {

      dd($genre->getAttribute('genre_id'));
      DB::table('genres')->where('genre_id', '=', $genre->getAttributes()['genre_id']);

      return redirect('/genres');
    }
}
