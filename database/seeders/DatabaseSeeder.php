<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' =>'Peter Pike',
            'email' => 'pikepeter@gmail.com',
            'role'  => 'admin',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);

        Post::factory()->count(5)->create();

    }
}
