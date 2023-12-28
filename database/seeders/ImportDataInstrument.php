<?php

namespace Database\Seeders;

use App\Models\Dimension;
use App\Models\Instrument;
use Error;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class ImportDataInstrument extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $headers = ['Instrumen', 'Dimensi', 'Reverse'];

        $filePath = "../../data/instruments.csv";
        $headersAsString = implode(',', $headers);

        $fileContents = file($filePath);

        if (trim($fileContents[0]) != trim($headersAsString)) {
            throw new Error("$fileContents[0]=======$headersAsString");
        }

        unset($fileContents[0]);

        $number = 1;
        foreach($fileContents as $line) {
            $splittedLine = str_getcsv($line, ",", '"');
            $dimension = Dimension::where('name', $splittedLine[1])->first();

            Instrument::create([
                'content' => $splittedLine[0],
                'numbering' => $number,
                'reverse' => $splittedLine[2],
                'dimension_id' => $dimension->id
            ]);
            $number++;
        }
    }
}
