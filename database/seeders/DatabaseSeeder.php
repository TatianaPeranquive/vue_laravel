<?php

namespace Database\Seeders;

use App\Models\Level;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
        levelSeeder::class,
        RoleSeeder::class,
        UserSeeder::class
      ]);

    }
}
