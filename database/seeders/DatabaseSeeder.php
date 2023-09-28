<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Status;
use App\Models\Game;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       User::factory()->create([
            'name' => 'Test Boy',
            'email' => 'test@test.com',
            'password' => bcrypt('password'),
        ]);

        Category::factory()->create(["name" => "Long"]);
        Category::factory()->create(["name" => "Medium"]);
        Category::factory()->create(["name" => "Short"]);

        Status::factory()->create(["name" => "Played"]);
        Status::factory()->create(["name" => "In Progress"]);
        Status::factory()->create(["name" => "Not Played"]);

        Game::factory(25)->create();
    }
}
