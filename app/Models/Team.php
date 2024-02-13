<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;


class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'creator_id', 
        'tournament_id',
        'main_form',
        'second_form',
        'coach_name',
        'coach_phone',
        'coach_email',
    ];
    protected $primaryKey = 'id';
    public $incrementing = false;

    protected $attributes = [
        'id' => null, 
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Str::uuid()->toString();
        });
    }

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function players()
    {
        return $this->belongsToMany(User::class)->withPivot('player_number');;
    }
    
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
}
