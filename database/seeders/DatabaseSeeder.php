<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (! User::where('email', 'admin@example.com')->exists()) {
            User::factory()->create([
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'is_admin' => true,
            ]);
        }

        if (Product::count() === 0) {
            Product::insert([
                [
                    'name' => 'Premium Sneakers',
                    'slug' => 'premium-sneakers',
                    'description' => 'Stylish and comfortable sneakers for everyday wear.',
                    'price' => 2499.00,
                    'image_url' => 'https://images.unsplash.com/photo-1549298916-b41d501d3772?w=420&h=300&fit=crop',
                    'stock' => 25,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Wireless Headphones',
                    'slug' => 'wireless-headphones',
                    'description' => 'Noise-cancelling headphones with long battery life.',
                    'price' => 3499.00,
                    'image_url' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=420&h=300&fit=crop',
                    'stock' => 40,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Smart Watch',
                    'slug' => 'smart-watch',
                    'description' => 'Track fitness, health, and notifications with ease.',
                    'price' => 1999.00,
                    'image_url' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=420&h=300&fit=crop',
                    'stock' => 20,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Designer Backpack',
                    'slug' => 'designer-backpack',
                    'description' => 'Stylish and functional backpack for work and travel.',
                    'price' => 1899.00,
                    'image_url' => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?w=420&h=300&fit=crop',
                    'stock' => 30,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Coffee Maker',
                    'slug' => 'coffee-maker',
                    'description' => 'Professional-grade coffee maker for perfect brews every time.',
                    'price' => 2999.00,
                    'image_url' => 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?w=420&h=300&fit=crop',
                    'stock' => 15,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Gaming Mouse',
                    'slug' => 'gaming-mouse',
                    'description' => 'High-precision gaming mouse with customizable RGB lighting.',
                    'price' => 1299.00,
                    'image_url' => 'https://images.unsplash.com/photo-1527814050087-3793815479db?w=420&h=300&fit=crop',
                    'stock' => 50,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Wireless Speaker',
                    'slug' => 'wireless-speaker',
                    'description' => 'Portable Bluetooth speaker with 360-degree sound.',
                    'price' => 2299.00,
                    'image_url' => 'https://images.unsplash.com/photo-1608043152269-423dbba4e7e1?w=420&h=300&fit=crop',
                    'stock' => 35,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Fitness Tracker',
                    'slug' => 'fitness-tracker',
                    'description' => 'Advanced fitness tracker with heart rate monitoring.',
                    'price' => 1599.00,
                    'image_url' => 'https://images.unsplash.com/photo-1575311373937-040b8e1fd5b6?w=420&h=300&fit=crop',
                    'stock' => 28,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Laptop Stand',
                    'slug' => 'laptop-stand',
                    'description' => 'Ergonomic laptop stand for better posture and cooling.',
                    'price' => 899.00,
                    'image_url' => 'https://images.unsplash.com/photo-1587614295999-6c1bd4c4f9e4?w=420&h=300&fit=crop',
                    'stock' => 42,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Mechanical Keyboard',
                    'slug' => 'mechanical-keyboard',
                    'description' => 'Premium mechanical keyboard with RGB backlighting.',
                    'price' => 3999.00,
                    'image_url' => 'https://images.unsplash.com/photo-1541140532154-b024d705b90a?w=420&h=300&fit=crop',
                    'stock' => 18,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Smartphone Case',
                    'slug' => 'smartphone-case',
                    'description' => 'Protective case with wireless charging compatibility.',
                    'price' => 599.00,
                    'image_url' => 'https://images.unsplash.com/photo-1565849904461-04a58ad377e0?w=420&h=300&fit=crop',
                    'stock' => 60,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'LED Desk Lamp',
                    'slug' => 'led-desk-lamp',
                    'description' => 'Adjustable LED lamp with multiple brightness levels.',
                    'price' => 799.00,
                    'image_url' => 'https://images.unsplash.com/photo-1513506003901-1e6a229e2d15?w=420&h=300&fit=crop',
                    'stock' => 22,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Portable Charger',
                    'slug' => 'portable-charger',
                    'description' => 'High-capacity power bank for all your devices.',
                    'price' => 1499.00,
                    'image_url' => 'https://images.unsplash.com/photo-1609594225934-6b9b9d0c0b7e?w=420&h=300&fit=crop',
                    'stock' => 45,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Bluetooth Earbuds',
                    'slug' => 'bluetooth-earbuds',
                    'description' => 'True wireless earbuds with active noise cancellation.',
                    'price' => 2799.00,
                    'image_url' => 'https://images.unsplash.com/photo-1590658268037-6bf12165a8df?w=420&h=300&fit=crop',
                    'stock' => 32,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Digital Camera',
                    'slug' => 'digital-camera',
                    'description' => 'Professional digital camera with 4K video recording.',
                    'price' => 8999.00,
                    'image_url' => 'https://images.unsplash.com/photo-1502920917128-1aa500764cbd?w=420&h=300&fit=crop',
                    'stock' => 8,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Yoga Mat',
                    'slug' => 'yoga-mat',
                    'description' => 'Non-slip yoga mat with carrying strap and alignment guides.',
                    'price' => 1299.00,
                    'image_url' => 'https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?w=420&h=300&fit=crop',
                    'stock' => 38,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Smart Home Hub',
                    'slug' => 'smart-home-hub',
                    'description' => 'Control all your smart devices from one central hub.',
                    'price' => 3499.00,
                    'image_url' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=420&h=300&fit=crop',
                    'stock' => 12,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Water Bottle',
                    'slug' => 'water-bottle',
                    'description' => 'Insulated stainless steel water bottle that keeps drinks cold for 24 hours.',
                    'price' => 699.00,
                    'image_url' => 'https://images.unsplash.com/photo-1523362628745-0c100150b504?w=420&h=300&fit=crop',
                    'stock' => 55,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Wireless Router',
                    'slug' => 'wireless-router',
                    'description' => 'High-speed WiFi 6 router for seamless connectivity.',
                    'price' => 4999.00,
                    'image_url' => 'https://images.unsplash.com/photo-1544197150-b99a580bb7a8?w=420&h=300&fit=crop',
                    'stock' => 16,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
        }
    }
}
