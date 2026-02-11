<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $categories = \App\Models\Category::all();

        Game::create([
            'title' => 'Counter Strike 2.0',
            'description' => 'Competitive 1st person shooter',
            'price' => 0,
            'urlImage' => 'images/games/cs.jpg',
            'category_id' => $categories->random()->id
        ]);

        Game::create([
            'title' => 'Call Of Duty Modern Warfare 3',
            'description' => 'Arcade first person shooter',
            'price' => 20,
            'urlImage' => 'images/games/codmw3.jpg',
            'category_id' => $categories->random()->id

        ]);

        Game::create([
            'title' => 'Fifa 26',
            'description' => 'Football game',
            'price' => 80,
            'urlImage' => 'images/games/fifa26.jpg',
            'category_id' => $categories->random()->id

        ]);

        Game::create([
            'title' => 'Helldivers 2',
            'description' => 'Shooter 3rd person game',
            'price' => 80,
            'urlImage' => 'images/games/helldivers2.jpg',
            'category_id' => $categories->random()->id

        ]);
            Game::create([
            'title' => 'Naruto Shippuden: Ultimate Ninja Storm 4 - Road to Boruto ',
            'description' => 'Arcade Game',
            'price' => 40,
            'urlImage' => 'images/games/narutostorm4.jpg',
            'category_id' => $categories->random()->id

        ]);

    }
}
