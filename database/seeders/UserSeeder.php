<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        for ($i = 0; $i < 20; $i++) {
            User::create([
                'email' => "user$i@gmail.com",
                'password' => bcrypt(123),
                'is_author' => mt_rand(0, 1),
            ]);
        }
    }
}
