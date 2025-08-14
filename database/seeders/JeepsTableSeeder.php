<?php

namespace Database\Seeders;

use App\Models\Jeep;
use Illuminate\Database\Seeder;

class JeepsTableSeeder extends Seeder
{
    public function run()
    {
        Jeep::create([
            'name' => 'Premium Safari Jeep',
            'description' => 'Experience the wild in comfort with our premium safari jeep',
            'price' => 12000.00,
            'seats' => 6,
            'features' => 'A/C, Photo Stops, Sun Roof'
        ]);
        
        Jeep::create([
            'name' => 'Standard Safari Jeep',
            'description' => 'Our most popular option with comfortable seating',
            'price' => 8500.00,
            'seats' => 8,
            'features' => 'Photo Stops, Binoculars'
        ]);
        
        Jeep::create([
            'name' => 'Budget Safari Jeep',
            'description' => 'Affordable authentic experience',
            'price' => 6000.00,
            'seats' => 6,
            'features' => 'Photo Stops'
        ]);
    }
}