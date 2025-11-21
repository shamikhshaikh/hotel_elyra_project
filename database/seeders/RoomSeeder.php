<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rooms = [
            // Solice Theme
            [
                'name' => 'Solice Grand Suite',
                'image_path' => 'http://127.0.0.1:8000/images/solicesuite1.jpg',
                'description' => 'Airy suite bathed in natural light with serene neutrals.',
                'price' => '$420/night',
                'features' => ['Ocean View', 'Private Balcony', 'Terrace Daybed Lounge'],
                'category' => 'suite',
                'size' => '85 sqm',
                'max_guests' => 4,
                'rating' => 4.9,
                'theme' => 'solice',
            ],
            [
                'name' => 'Solice Skyline Suite',
                'image_path' => 'http://127.0.0.1:8000/images/solicesuite2.jpg',
                'description' => 'Minimalist luxury with panoramic city views.',
                'price' => '$390/night',
                'features' => ['City View', 'Mini Bar', 'Soundproof Serenity Design'],
                'category' => 'suite',
                'size' => '78 sqm',
                'max_guests' => 3,
                'rating' => 4.8,
                'theme' => 'solice',
            ],
            [
                'name' => 'Solice Horizon Penthouse',
                'image_path' => 'http://127.0.0.1:8000/images/solicepenthouse1.jpg',
                'description' => 'Top-floor tranquility with expansive terrace.',
                'price' => '$680/night',
                'features' => ['Terrace', 'Atrium', 'Private Infinity Pool'],
                'category' => 'penthouse',
                'size' => '160 sqm',
                'max_guests' => 6,
                'rating' => 5.0,
                'theme' => 'solice',
            ],
            [
                'name' => 'Solice Garden Penthouse',
                'image_path' => 'http://127.0.0.1:8000/images/solicepenthouse2.jpg',
                'description' => 'Indoor-outdoor living with lush greenery.',
                'price' => '$650/night',
                'features' => ['Garden View', 'Private Pool', 'Private Garden Patio'],
                'category' => 'penthouse',
                'size' => '150 sqm',
                'max_guests' => 6,
                'rating' => 4.9,
                'theme' => 'solice',
            ],
            [
                'name' => 'Solice Serenity Room',
                'image_path' => 'http://127.0.0.1:8000/images/soliceroom1.jpg',
                'description' => 'Calm, elegant room for a restful stay.',
                'price' => '$220/night',
                'features' => ['Personal Dining', 'Daybed', 'Aromatherapy Diffuser'],
                'category' => 'standard',
                'size' => '32 sqm',
                'max_guests' => 2,
                'rating' => 4.7,
                'theme' => 'solice',
            ],
            [
                'name' => 'Solice Deluxe Room',
                'image_path' => 'http://127.0.0.1:8000/images/soliceroom2.jpg',
                'description' => 'Light-filled room with soft tones and refined finishes.',
                'price' => '$250/night',
                'features' => ['City View', 'Rain Shower', 'Smart Mirror Display'],
                'category' => 'standard',
                'size' => '36 sqm',
                'max_guests' => 2,
                'rating' => 4.8,
                'theme' => 'solice',
            ],

            // Vault Theme
            [
                'name' => 'Vault Royal Suite',
                'image_path' => 'http://127.0.0.1:8000/images/vaultsuite1.jpg',
                'description' => 'Dark marble and gold accents for a dramatic stay.',
                'price' => '$520/night',
                'features' => ['Skyline View', 'Private Bar', 'Jacuzzi'],
                'category' => 'suite',
                'size' => '92 sqm',
                'max_guests' => 4,
                'rating' => 4.9,
                'theme' => 'vault',
            ],
            [
                'name' => 'Vault Noir Suite',
                'image_path' => 'http://127.0.0.1:8000/images/vaultsuite2.jpg',
                'description' => 'Sophisticated lighting and premium leather finishes.',
                'price' => '$490/night',
                'features' => ['City View', 'Mini Bar', 'Onyx Bath'],
                'category' => 'suite',
                'size' => '86 sqm',
                'max_guests' => 3,
                'rating' => 4.8,
                'theme' => 'vault',
            ],
            [
                'name' => 'Vault Crown Penthouse',
                'image_path' => 'http://127.0.0.1:8000/images/vaultpenthouse1.jpg',
                'description' => 'Premier penthouse with expansive skyline terrace.',
                'price' => '$820/night',
                'features' => ['Private Cinema', 'Jacuzzi', 'Smart Glass Walls'],
                'category' => 'penthouse',
                'size' => '180 sqm',
                'max_guests' => 6,
                'rating' => 5.0,
                'theme' => 'vault',
            ],
            [
                'name' => 'Vault Obsidian Penthouse',
                'image_path' => 'http://127.0.0.1:8000/images/vaultpenthouse2.jpg',
                'description' => 'Ultra-sleek penthouse wrapped in dark glass.',
                'price' => '$780/night',
                'features' => ['Skyline View', 'Heated Marble Floors', 'Private Bar'],
                'category' => 'penthouse',
                'size' => '170 sqm',
                'max_guests' => 6,
                'rating' => 4.9,
                'theme' => 'vault',
            ],
            [
                'name' => 'Vault Executive Room',
                'image_path' => 'http://127.0.0.1:8000/images/vaultroom1.jpg',
                'description' => 'Elegant room with rich textures and smart lighting.',
                'price' => '$280/night',
                'features' => ['Marble Vanity', 'Ambient Mood Lighting', 'Rain Shower'],
                'category' => 'standard',
                'size' => '34 sqm',
                'max_guests' => 2,
                'rating' => 4.7,
                'theme' => 'vault',
            ],
            [
                'name' => 'Vault Signature Room',
                'image_path' => 'http://127.0.0.1:8000/images/vaultroom2.jpg',
                'description' => 'Refined materials and a moody, luxurious palette.',
                'price' => '$300/night',
                'features' => ['Crystal Glassware', 'City View', 'Automated Ambience'],
                'category' => 'standard',
                'size' => '36 sqm',
                'max_guests' => 2,
                'rating' => 4.8,
                'theme' => 'vault',
            ],
        ];

        foreach ($rooms as $room) {
            Room::create($room);
        }
    }
}
