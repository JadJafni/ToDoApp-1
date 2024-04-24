<?php

namespace Database\Seeders;

use App\Models\category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        categories::factory()->create([
            'userID' => '1',
            'category_title' => 'personal',
        ]);
    }
}
