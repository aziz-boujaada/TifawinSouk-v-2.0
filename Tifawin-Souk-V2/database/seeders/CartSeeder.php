<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all existing users
        $users = User::all();

        foreach ($users as $user) {
            // Create 1 cart per user (or change number as needed)
             Cart::factory()->create([
                'user_id' => $user->id,
            ]);


        }
    }
}
