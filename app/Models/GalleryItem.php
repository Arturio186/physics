<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'subcategory_id', 'filename', 'date',
    ];

    public function subcategory()
    {
        return $this->belongsTo(EventDay::class);
    }

    public function eventDay()
    {
        return $this->belongsTo(EventDay::class, 'subcategory_id');
    }
}
