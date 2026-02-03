<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = [
            [
                'name' => 'TechMorocco SARL',
                'email' => 'contact@techmorocco.ma',
                'city' => 'Casablanca',
                'phone' => '0522123456'
            ],
            [
                'name' => 'Fashion Maroc',
                'email' => 'info@fashionmaroc.ma',
                'city' => 'Rabat',
                'phone' => '0537654321'
            ],
            [
                'name' => 'HomeStyle Import',
                'email' => 'sales@homestyle.ma',
                'city' => 'Marrakech',
                'phone' => '0524987654'
            ],
            [
                'name' => 'SportPlus Distribution',
                'email' => 'orders@sportplus.ma',
                'city' => 'Tanger',
                'phone' => '0539876543'
            ],
            [
                'name' => 'BeautyPro Maroc',
                'email' => 'contact@beautypro.ma',
                'city' => 'Fès',
                'phone' => '0535234567'
            ],
        ];

        foreach ($suppliers as $supplier) {
            Supplier::create($supplier);
        }

        
        Supplier::factory(10)->create();
    }
}