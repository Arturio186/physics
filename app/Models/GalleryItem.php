<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id`', 'filename', 'type', 'title', 'date',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
