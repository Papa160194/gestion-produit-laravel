<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'iPhone 15 Pro',
                'description' => 'Le dernier iPhone avec une caméra professionnelle et un design en titane. Écran Super Retina XDR de 6,1 pouces, puce A17 Pro, et jusqu\'à 1 To de stockage.',
                'price' => 1199.00,
                'quantity' => 25,
                'image' => null
            ],
            [
                'name' => 'MacBook Air M2',
                'description' => 'Ordinateur portable ultra-léger avec puce M2, écran Liquid Retina de 13,6 pouces, jusqu\'à 18 heures d\'autonomie et design en aluminium recyclé.',
                'price' => 1499.00,
                'quantity' => 15,
                'image' => null
            ],
            [
                'name' => 'AirPods Pro',
                'description' => 'Écouteurs sans fil avec réduction de bruit active, audio spatial et résistance à l\'eau. Jusqu\'à 4,5 heures d\'écoute avec une seule charge.',
                'price' => 249.00,
                'quantity' => 50,
                'image' => null
            ],
            [
                'name' => 'iPad Air',
                'description' => 'Tablette polyvalente avec puce M1, écran Liquid Retina de 10,9 pouces, support Apple Pencil et Magic Keyboard. Parfaite pour la créativité et la productivité.',
                'price' => 699.00,
                'quantity' => 30,
                'image' => null
            ],
            [
                'name' => 'Apple Watch Series 9',
                'description' => 'Montre connectée avec puce S9, écran Always-On, suivi de santé avancé et double tap pour les interactions. Disponible en 41mm et 45mm.',
                'price' => 399.00,
                'quantity' => 40,
                'image' => null
            ],
            [
                'name' => 'iMac 24"',
                'description' => 'Ordinateur tout-en-un avec puce M3, écran Retina 4,5K de 24 pouces, design coloré et système audio intégré. Idéal pour la maison et le bureau.',
                'price' => 1499.00,
                'quantity' => 10,
                'image' => null
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
} 