<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'start_date', 'is_active'];

    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    public function referees()
    {
        return $this->hasMany(Referee::class);
    }
}
