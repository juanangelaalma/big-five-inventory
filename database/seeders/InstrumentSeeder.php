<?php

namespace Database\Seeders;

use App\Models\Dimension;
use App\Models\Instrument;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstrumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numberOfInstruments = 60;
        $dimensionIds = Dimension::pluck('id');
        $dimensionCount = $dimensionIds->count();

        $numMultiple = $numberOfInstruments / $dimensionCount;

        $index = 0;

        for($i=0; $i<$numberOfInstruments; $i++) {
            if ($i !== 0 && $i % $numMultiple === 0) {
                $index++;
            }
            Instrument::create([
                'dimension_id' => $dimensionIds[$index],
                'content' => fake()->text(20),
                'numbering' => $i,
                'reverse' => array_rand([1, 0])
            ]);
        }
    }
}
