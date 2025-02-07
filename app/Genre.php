<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = [
      'name'
    ];

    protected $table = 'genres';

    protected $primaryKey = 'genre_id';
}
