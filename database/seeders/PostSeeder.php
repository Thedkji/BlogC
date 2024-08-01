<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) {
            Post::create([
                "category_id" => mt_rand(1, 20),
                "author_id" => mt_rand(1, 20),
                "title" => fake()->title(),
                "img" => "",
                "content" => fake()->text(),
                "view_like" => mt_rand(1, 300),
            ]);
        }
    }
}
