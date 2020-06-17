<?php

namespace App\Http\Controllers;

use App\CD;
use App\Genre;
use Illuminate\Http\Request;

class CDsController extends Controller
{
    public function index() {
      $cds = CD::all();

      $result = array();

      foreach($cds as $index => $cd) {
        $attributes = $cd->getAttributes();
        $genreAttributes = $cd->genre()->first()->getAttributes();

        $newCd = array_merge($attributes, [
          'genre_name' => $genreAttributes['name'],
        ]);

        array_push($result, $newCd);
      }


      return view('welcome', compact('result'));
    }
}
