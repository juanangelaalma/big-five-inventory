<?php

namespace Database\Seeders;

use App\Models\Dimension;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DimensionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dimensions = [
            ['name' => 'Extraversion', 'order' => 3],
            ['name' => 'Agreeableness', 'order' => 4],
            ['name' => 'Conscientiousness', 'order' => 2],
            ['name' => 'Neuroticism', 'order' => 5],
            ['name' => 'Openness', 'order' => 1],
        ];

        Dimension::insert($dimensions);
    }
}
