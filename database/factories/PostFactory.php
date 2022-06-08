<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;


class PostFactory extends Factory
{


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->sentence;
        $slug = Str::slug($title,'-');

        return [
            'uuid'          =>$this->faker->uuid,
            'title'         => $title,
            'slug'          => $slug,
            'body'          => $this->faker->paragraph,
        ];
    }
}
