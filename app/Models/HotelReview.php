<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelReview extends Model
{
    use HasFactory;
    protected $table = 'hotel_reviews';
    protected $fillable = ['hotel_id', 'user_id', 'rating', 'comment'];

    public function hotel()
    {
        return $this->belongsTo(hotel::class);
    }
}
