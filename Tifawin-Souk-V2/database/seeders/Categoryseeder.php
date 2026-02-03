<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Électronique',
                'slug' => 'electronique',
                'description' => 'Produits électroniques et accessoires'
            ],
            [
                'name' => 'Mode & Vêtements',
                'slug' => 'mode-vetements',
                'description' => 'Vêtements, chaussures et accessoires de mode'
            ],
            [
                'name' => 'Maison & Jardin',
                'slug' => 'maison-jardin',
                'description' => 'Articles pour la maison et le jardin'
            ],
            [
                'name' => 'Sports & Loisirs',
                'slug' => 'sports-loisirs',
                'description' => 'Équipements sportifs et loisirs'
            ],
            [
                'name' => 'Beauté & Santé',
                'slug' => 'beaute-sante',
                'description' => 'Produits de beauté et santé'
            ],
            [
                'name' => 'Alimentation',
                'slug' => 'alimentation',
                'description' => 'Produits alimentaires et boissons'
            ],
            [
                'name' => 'Livres & Média',
                'slug' => 'livres-media',
                'description' => 'Livres, musique et films'
            ],
            [
                'name' => 'Jouets & Enfants',
                'slug' => 'jouets-enfants',
                'description' => 'Jouets et produits pour enfants'
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}