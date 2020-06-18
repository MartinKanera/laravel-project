<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CD extends Model
{
  protected $table = 'cds';

  public function genre () {
    return $this->belongsTo('App\Genre', 'genre_id', 'genre_id')->get();
  }

  protected $fillable = [
    'name',
    'artist',
    'cover',
    'genre_id',
    'release_year',
  ];
}
