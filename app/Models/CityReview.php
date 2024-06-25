<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityReview extends Model
{
    use HasFactory;
    protected $table = 'city_reviews';
    protected $fillable = ['city_id', 'user_id', 'rating', 'comment'];

    public function city()
    {
        return $this->belongsTo(city::class);
    }
}
