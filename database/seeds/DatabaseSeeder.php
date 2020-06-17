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
          'genre_name' => 'Rock\'n\'Roll',
        ]);

        DB::table('genres')->insert([
          'genre_name' => 'Pop',
        ]);

        DB::table('cds')->insert([
          'name' => 'Get Ready To Die',
          'artist' => 'Andrew W.K.',
          'release_year' => 2001,
          'cover' => 'https://light-in-the-attic.s3.amazonaws.com/uploads/release_image/23827/image/large_550_tmp_2F1563384425998-y327clfi3d-0125c7db5c3e64ad9f8ad23a54567162_2FETR087.Andrew.W.K.-I.Get.Wet.jpg',
          'genre_id' => 1
        ]);

        DB::table('cds')->insert([
          'name' => 'Summer Is a Curse',
          'artist' => 'The FAIM',
          'release_year' => 2018,
          'cover' => 'https://pisnicky-akordy.cz/images/com_lyrics/albums/12/summer-is-a-curse-lp_106589.jpg',
          'genre_id' => 2
        ]);
    }
}
