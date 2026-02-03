<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();
        $suppliers = Supplier::all();

        Product::factory(50)->create([
            'category_id' => fn() => $categories->random()->id,
            'supplier_id' => fn() => $suppliers->random()->id,
        ]);

        Product::factory(10)->lowStock()->create([
            'category_id' => fn() => $categories->random()->id,
            'supplier_id' => fn() => $suppliers->random()->id,
        ]);

        Product::factory(5)->outOfStock()->create([
            'category_id' => fn() => $categories->random()->id,
            'supplier_id' => fn() => $suppliers->random()->id,
        ]);
    }
}