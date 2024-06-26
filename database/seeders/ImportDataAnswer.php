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
        $filePath = base_path("data/posttest.csv");

        $fileContents = file($filePath);

        unset($fileContents[0]);

        $instruments = Instrument::orderBy('numbering', 'ASC')->get();

        $fails = [];

        foreach($fileContents as $line) {
            $splittedLine = explode(",", $line);
            $index = 10;
            $user = User::where('email', str_replace('"', '', $splittedLine[1]))->first();

            if($user) {
                $answer_status_id = null;
                foreach($instruments as $instrument) {
                    $answer = Answer::create([
                        'user_id' => $user->id,
                        'instrument_id' => $instrument->id,
                        'score' => $splittedLine[$index + $instrument->numbering],
                        'created_at' => date('Y-m-d H:i:s', strtotime($splittedLine[0]))
                    ]);
                    $answer_status_id = $answer->answer_status_id;
                }
                AnswerStatus::find($answer_status_id)->update(['status' => 'done']);
            } else {
                $fails[] = $splittedLine;
            }
        }

        Log::info($fails);
    }
}
