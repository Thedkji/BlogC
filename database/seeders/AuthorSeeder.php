<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ho = ["Nguyễn", "Trần", "Lê", "Phạm", "Huỳnh", "Vũ", "Đặng"];
        $lot = ["Thị", "Ngọc", "Văn", "Minh", "Đinh", "Quốc", "Xuân"];
        $ten = ["Tú", "An", "Quang", "Mạnh", "Phương", "Đức"];

        $phone = ['096', '038', '091', '093'];
        for ($i = 0; $i < 20; $i++) {
            Author::create([
                'user_name' => "name$i",
                'pass' => bcrypt(123),
                'name' => Arr::random($ho) . " " . Arr::random($lot) . " " . Arr::random($ten),
                'avatar' => "",
                'bio' => "Đây là bio của name $i",
                'date_of_birth' => fake()->date(),
                'email' => "email$i@gmail.com",
                'phone' => Arr::random($phone) . str_shuffle("0123456789"),
                'role' => Arr::random(["admin", "client"]),
            ]);
        }
    }
}
