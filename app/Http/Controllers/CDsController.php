<?php

namespace App\Http\Controllers;

use App\CD;
use App\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class CDsController extends Controller
{
    public function index(Request $request) {
      $scope = '';
      $order = '';

      if($request->get('scope') !== null) {
        $scope = filter_var($request->get('scope'), FILTER_CALLBACK, array('options' => function ($checkedScope) {
          $validScopes = ['name', 'artist', 'release_year', 'genre'];
          return in_array($checkedScope, $validScopes);
        }));
      }

      if($request->get('order') !== null) {
        $order = filter_var($request->get('order'), FILTER_CALLBACK, array('options' => function ($checkedOrder) {
          $validOrders = ['asc', 'desc'];
          return in_array($checkedOrder, $validOrders);
        }));
      }

      if($scope === false || $order === false)
        return response()->view('errors.400', [], 400);

      $scope = $request->get('scope') ?? 'name';
      $order = $request->get('order') ?? 'asc';

      $cds = DB::table('cds')
        ->join('genres', 'cds.genre_id', '=', 'genres.genre_id')
        ->orderBy($scope === 'genre' ? 'genres.genre_name' : 'cds.' . $scope, $order)
        ->select('*')
        ->get();

      return view('cds.index', compact('cds'));
    }

    public function show (CD $cd) {
      $cdAttributes = $cd->getAttributes();


      $genreAttributes = $cd->genre()->first()->getAttributes();

      $newCd = array_merge($cdAttributes, $genreAttributes);

      return view('cds.show', compact('newCd'));
    }

    public function destroy (CD $cd) {
      try {
        $cd->delete();
      } catch(ErrorException $exception) {};

      return redirect('/');
    }

    public function create () {
      $genres = Genre::all();

      return view('cds.create', compact('genres'));
    }

    public function store (Request $request) {
      $data = $request->validate([
        'name' => 'required|string|min:2|max:32',
        'artist' => 'required|string|min:2|max:32',
        'cover' => 'image',
        'genre_id' => 'required|integer|min:1',
        'release_year' => 'required|integer|min:1900'
      ]);

      if(isset($data['cover'])) {
        $imagePath = $data['cover']->store('uploads', 'public');

        $image = Image::make(public_path('storage/' . $imagePath))->fit(1200, 1200);
        $image->save();

        $data['cover'] = $imagePath;
      }

      $cd = new CD;

      $cd->fill($data);
      $cd->save();

      return redirect('/');
    }

    public function edit (CD $cd) {
      $genres = Genre::all();

      return view('cds.edit', compact('cd', 'genres'));
    }

    public function update (CD $cd, Request $request) {
      $data = $request->validate([
        'name' => 'required|string|min:2|max:32',
        'artist' => 'required|string|min:2|max:32',
        'cover' => 'image',
        'genre_id' => 'required|integer|min:1',
        'release_year' => 'required|integer|min:1900'
      ]);

      if(isset($data['cover'])) {
        $imagePath = $data['cover']->store('uploads', 'public');

        $image = Image::make(public_path('storage/' . $imagePath))->fit(256, 256);
        $image->save();

        $data['cover'] = $imagePath;
      }

      $cd->update($data);
      $cd->save();

      return redirect('/');
    }
}
