<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\SafariPackagesTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Only create Admin if it doesn't exist
        if (!User::where('email', 'admin@wildride.com')->exists()) {
            User::factory()->create([
                'name' => 'Admin',
                'email' => 'admin@wildride.com',
                'password' => bcrypt('wildride123'),
                'is_admin' => true,
            ]);
        }

        // Only create Test User if it doesn't exist
        if (!User::where('email', 'test@example.com')->exists()) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
        }

        $this->call(SafariPackagesTableSeeder::class);
    }
}
