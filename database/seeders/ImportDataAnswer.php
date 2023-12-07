<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\AnswerStatus;
use App\Models\Instrument;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class ImportDataAnswer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filePath = "C:\Users\juanl\Downloads\Pre_Test_Pelatihan_Peningkatan_Kompetensi_Kepribadian_dan_Personal.xlsx - Form Responses 1.csv";
        
        $fileContents = file($filePath);

        unset($fileContents[0]);
        unset($fileContents[1]);

        $instruments = Instrument::orderBy('numbering', 'ASC')->get();
        
        foreach($fileContents as $line) {
            $splittedLine = explode(",", $line);
            $index = 10;
            $user = User::where('email', $splittedLine[1])->first();

            if($user) {
                foreach($instruments as $instrument) {
                    $answer = Answer::create([
                        'user_id' => $user->id,
                        'instrument_id' => $instrument->id,
                        'score' => $splittedLine[$index + $instrument->numbering],
                    ]);
                    AnswerStatus::find($answer->answer_status_id)->update(['status' => 'done']);
                }
            }
        }
    }
}
