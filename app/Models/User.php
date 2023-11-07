<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    public const ROLES = ['admin', 'counselor', 'student'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function profile() {
        return $this->hasOne(Profile::class);
    }

    public function answers() {
        return $this->hasMany(Answer::class);
    }

    public function isAdmin() {
        return $this->role === 'admin';
    }

    public function isCounselor() {
        return $this->role === 'counselor';
    }

    public function isStudent() {
        return $this->role === 'student';
    }

    public function hasCompleteProfile() {
        if(!$this->profile) {
            return false;
        }

        return $this->profile->student_number
                && $this->profile->batch
                && $this->profile->major
                && $this->profile->birth_location
                && $this->profile->birth_date
                && $this->profile->ethnicity;
    }

    public function hasCompleteInstruments() {
        return $this->instruments->count() > 0;
    }
}
