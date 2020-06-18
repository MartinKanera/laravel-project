<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;
use App\CD;
use Illuminate\Support\Facades\DB;

class GenresController extends Controller
{
    public function index () {
      $genres = Genre::all();

      return view('genres.index', compact('genres'));
    }

    public function destroy ($genre_id) {
      DB::table('genres')->where('genre_id', '=', $genre_id)->delete();

      return redirect('/genres');
    }
}
