<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Error;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Log;

class ImportDataUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $headers = ["No", "Email Address", "NIM", "NAMA", "Angkatan", "Program Studi", "Jenis Kelamin", "Tempat Lahir", "Tanggal Lahir", "Usia", "Suku"];

        $filePath = "../../data/user.csv";
        $headersAsString = implode(",", $headers);

        
        $fileContents = file($filePath);
        if (trim($fileContents[0]) != trim($headersAsString)) {
            throw new Error("$fileContents[0]=======$headersAsString");
        }

        unset($fileContents[0]);

        foreach($fileContents as $line) {
            $splittedLine = explode(",", $line);
            $user = new User([
                'email' => $splittedLine[1],
                'name'  => $splittedLine[3],
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'role'  => 'student'
            ]);
            try {
                $user->save();
            } catch(UniqueConstraintViolationException $error) {
                continue;
            }
            $profile = new Profile([
                'user_id' => $user->id,
                'student_number' => $splittedLine[2],
                'batch' => $splittedLine[4],
                'major' => $splittedLine[5],
                'birth_location' => $splittedLine[7], 
                'birth_date' => date('Y-m-d', strtotime($splittedLine[8])), 
                'gender' => $splittedLine[6] === 'Perempuan' ? 'female' : 'male',
                'ethnicity' => $splittedLine[10], 
            ]);
            $profile->save();
        }
    }
}
