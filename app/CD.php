<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CD extends Model
{
  protected $table = 'cds';

  public function genre () {
    return $this->belongsTo('App\Genre', 'genre_id', 'genre_id')->get();
  }

  private static $whiteListFilter = [
    'name',
    'artist',
    'genre',
    'release_year',
  ];
}
