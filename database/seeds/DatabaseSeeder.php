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
    }
}
