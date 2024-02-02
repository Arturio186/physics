<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventDay extends Model
{
    use HasFactory;
    protected $fillable = ['title'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function galleryItems()
    {
        return $this->hasMany(GalleryItem::class, 'subcategory_id');
    }
}
