<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    
    protected $fillable = [
        'title',
        'venue',
        'date',
        'start_time',
        'description',
        'booking_url',
        'tags',
        'organizer_id',
        'event_category_id',
        'created_at',
        'updated_at',
    ];
    protected $casts = [
        'tags' => 'array', // Cast the tags attribute to an array
    ];

    use HasFactory;

    public function eventCategory(): BelongsTo {
        return $this->belongsTo(EventCategory::class);
    }
    public function organizer(): BelongsTo {
        return $this->belongsTo(Organizer::class);
    }
}
