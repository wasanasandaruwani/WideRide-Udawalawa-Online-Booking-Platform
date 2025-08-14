<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SafariPackage;

class SafariPackagesTableSeeder extends Seeder
{
    public function run()
    {
        SafariPackage::insert([
            [
                'name' => 'Full Day Safari',
                'description' => 'A complete day in the wild! Includes lunch, refreshments, and a dedicated guide. Perfect for wildlife enthusiasts.',
                'price' => 10000,
                'features' => 'Lunch, refreshments, dedicated guide',
                'image' => 'images/sky.jpg',
            ],
            [
                'name' => 'VIP Luxury Safari',
                'description' => 'Private luxury jeep, gourmet meals, park entry, and a professional photographer. The ultimate safari experience.',
                'price' => 25000,
                'features' => 'Luxury jeep, gourmet meals, park entry, photographer',
                'image' => 'images/vip.jpg',
            ],
            [
                'name' => 'Morning Safari',
                'description' => 'Experience the wildlife at sunrise with our guided morning safari tour. Includes breakfast and park entry.',
                'price' => 5000,
                'features' => 'Breakfast, park entry',
                'image' => 'images/morning.jpg',
            ],
            [
                'name' => 'Evening Safari',
                'description' => 'Enjoy the golden hour and spot elephants and birds on our evening safari. Includes snacks and park entry.',
                'price' => 5500,
                'features' => 'Snacks, park entry',
                'image' => 'images/image 28.jpg',
            ],
            [
                'name' => 'Elephants Watching Safari',
                'description' => 'Expert elephant guide, snacks included, park entry included. Best for elephant lovers.',
                'price' => 6000,
                'features' => 'Expert elephant guide, snacks, park entry',
                'image' => 'images/elephant.jpg',
            ],
            [
                'name' => 'Family Safari',
                'description' => 'A fun and safe safari for families with children. Includes snacks, games, and a family-friendly guide.',
                'price' => 8000,
                'features' => 'Snacks, games, family-friendly guide',
                'image' => 'images/family.jpg',
            ],
            [
                'name' => 'Photography Safari',
                'description' => 'Guided by a wildlife photographer. Includes special stops for the best shots and photo tips.',
                'price' => 12000,
                'features' => 'Wildlife photographer, photo tips',
                'image' => 'images/photography.jpg',
            ],
            [
                'name' => 'Night Safari',
                'description' => 'Explore the park after dark and spot nocturnal wildlife. Includes night vision equipment.',
                'price' => 9000,
                'features' => 'Night vision equipment',
                'image' => 'images/night.jpg',
            ],
            [
                'name' => 'Eco Safari',
                'description' => 'Eco-friendly jeeps, local snacks, and a focus on conservation. Great for nature lovers.',
                'price' => 7000,
                'features' => 'Eco jeeps, local snacks, conservation focus',
                'image' => 'images/eco.jpg',
            ],
            [
                'name' => 'Group Safari',
                'description' => 'Special rates for groups of 6 or more. Includes guide, snacks, and group activities.',
                'price' => 4500,
                'features' => 'Guide, snacks, group activities',
                'image' => 'images/group.jpg',
            ],
        ]);
    }
}
