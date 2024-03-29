<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'date',
    ];
    

    public function days()
    {
        return $this->hasMany(EventDay::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
