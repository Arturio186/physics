<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referee extends Model
{
    use HasFactory;

    protected $fillable = [
        'surname',
        'name',
        'midname',
        'phone_number',
        'email',
        'category_id',
        'tournament_id',
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
}
