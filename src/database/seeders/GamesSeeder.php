<?php

namespace Database\Seeders;

use App\Models\Developers;
use App\Models\Games;
use App\Models\Genres;
use Illuminate\Database\Seeder;

class GamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Developers::factory(10)->create();
        Genres::factory(10)->create();
        Games::factory(50)->create();

        Games::all()->each(function ($games) {
            $randomFields = Genres::all()->random( rand(0, 10) )->pluck('id');
            $games->genres()->attach($randomFields);
        });
    }
}
