<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Links>
 */
class LinkFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'url' => $this->faker->url,
            'owner_id' => User::inRandomOrder()->first(),
            'position' => strtoupper('right'),
            'sort' => '1',
            'status' => true,
        ];
    }
}
