<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
          'name' => 'Rap',
        ]);

        DB::table('genres')->insert([
          'name' => 'Pop',
        ]);

        DB::table('cds')->insert([
          'name' => 'Thinking',
          'artist' => 'Oh Yeah',
          'release_year' => 2009,
          'genre_id' => 2
        ]);

        DB::table('cds')->insert([
          'name' => 'OMGGGGGGGGGGGGGGGG',
          'artist' => 'Pumpicka',
          'release_year' => 2010,
          'genre_id' => 1
        ]);
    }
}
