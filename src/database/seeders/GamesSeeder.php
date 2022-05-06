<?php

namespace Database\Seeders;

use App\Models\Developers;
use App\Models\Games;
use App\Models\Genres;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->makeStatuses();
        Developers::factory(10)->create();
        Genres::factory(10)->create();
        Games::factory(50)->create();

        Games::all()->each(function ($games) {
            $randomFields = Genres::all()->random(rand(1, 4))->pluck('id');
            $games->genres()->attach($randomFields);
        });
    }

    private function makeStatuses(): void
    {
        DB::table('statuses')->insert(['name' => 'Release']);
        DB::table('statuses')->insert(['name' => 'Beta']);
        DB::table('statuses')->insert(['name' => 'Developing']);
    }
}
