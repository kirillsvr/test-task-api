<?php

namespace Database\Factories;

use App\Models\Developers;
use App\Models\Status;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Games>
 */
class GamesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'developer_id' => Developers::all()->random()->id,
            'status_id' => Status::all()->random()->id,
        ];
    }
}
