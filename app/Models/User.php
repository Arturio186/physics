<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends \TCG\Voyager\Models\User
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'surname',
        'name',
        'mid_name',
        'birthdate',
        'email',
        'phone_number',
        'work_space',
        'study_place',
        'password',
        'location',
        'rank',
        'photo_path',
        'sport_role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function isAdmin()
    {
        return $this->role_id == '1';
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class)->withPivot(['player_number', 'cought_balls', 'falls', 'good_shots', 'total']);
    }
}
