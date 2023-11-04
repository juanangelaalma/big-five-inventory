<?php

namespace App\Models;

use Error;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_number',
        'batch',
        'major',
        'gender',
        'birth_location',
        'birth_date',
        'ethnicity'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
