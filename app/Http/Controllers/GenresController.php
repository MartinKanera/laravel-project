<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;
use App\CD;
use Illuminate\Support\Facades\DB;

class GenresController extends Controller
{
    public function index (Request $request) {
      $order = '';

      if($request->get('order') !== null) {
        $order = filter_var($request->get('order'), FILTER_CALLBACK, array('options' => function ($checkedOrder) {
          $validOrders = ['asc', 'desc'];
          return in_array($checkedOrder, $validOrders);
        }));
      }

      if($order === false)
        return response()->view('errors.400', [], 400);

      $order = $request->get('order') ?? 'asc';

      $genres = Genre::all()->sortBy('genre_name', 0, $order === 'desc');

      return view('genres.index', compact('genres'));
    }

    public function destroy ($genre_id) {
      DB::table('genres')->where('genre_id', '=', $genre_id)->delete();

      return redirect('/genres');
    }

    public function show ($genre_id) {
      $genre_data = DB::table('genres')->where('genre_id', '=', $genre_id)->get()->first();

      $cds = DB::table('cds')->where('genre_id', '=', $genre_id)->get();

      return view('genres.show', compact('genre_data', 'cds'));
    }

    public function edit ($genre_id) {
      $genre_data = Genre::find($genre_id);

      return view('genres.edit', compact('genre_data'));
    }

    public function update ($genre_id, Request $request) {
      $request->merge(['genre_name' => ucwords($request->post('genre_name'))]);

      $data = $request->validate([
        'genre_name' => 'required|string|min:2|max:32|unique:genres'
      ]);

      $genre = Genre::find($genre_id);
      $genre->genre_name = ucwords($data['genre_name']);

      $genre->save();

      return redirect('/genres');
    }

    public function create () {
      return view('genres.create');
    }

    public function store (Request $request) {
      $request->merge(['genre_name' => ucwords($request->post('genre_name'))]);

      $data = $request->validate([
        'genre_name' => 'required|string|min:2|max:32|unique:genres'
      ]);

      $newGenre = new Genre;

      $newGenre->genre_name = $data['genre_name'];
      $newGenre->save();

      return redirect('/genres');
    }
}
