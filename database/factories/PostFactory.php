<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $slug = Str::slug($title, '-');

        return [
            'cover_image'       => 'http://localhost/images/'.rand(1, 6).'.jpeg',
            'title'             => $title,
            'slug'              => $slug,
            'body'              => $this->faker->paragraph(5),
            'is_in_vault'       => false,
            'meta_description'  => $this->faker->paragraph,
            'published_at'      => $this->faker->dateTimeThisMonth(),
            'author_id'         => User::inRandomOrder()->first(),
            'category_id'       => Category::inRandomOrder()->first(),
        ];
    }
}
