<?php

namespace App\Http\Controllers;

use App\CD;
use App\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
