<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     DB::table('categories')->insert([
            'name' =>'Asia Watch',
            'slug' =>'asia-watch',
        ]);  

     DB::table('categories')->insert([
            'name' =>'The Vault',
            'slug' =>'the-vault',
        ]);       
     DB::table('categories')->insert([
            'name' =>'Foreign Correspondence',
            'slug' =>'foreign-correspondence',
        ]);       
    }
}
