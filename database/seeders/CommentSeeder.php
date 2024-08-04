<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 20; $i++) {
            Comment::create([
                "post_id" => mt_rand(1, 20),
                "author_id" => mt_rand(1, 20),
                "user_id" => mt_rand(1, 20),
                "comment" => fake()->text(),
            ]);
        }
    }
}
