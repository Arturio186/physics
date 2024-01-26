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
    
    public function galleryItems()
    {
        return $this->hasMany(GalleryItem::class);
    }
}
