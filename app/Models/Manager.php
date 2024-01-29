<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    use HasFactory;

    protected $table = "managers";
    protected $fillable = ['name', 'last_name', 'middle_name', 'phone', 'email', 'photo_path'];
}
