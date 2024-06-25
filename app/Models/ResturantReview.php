<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResturantReview extends Model
{
    use HasFactory;
    protected $table = 'resturant_reviews';
    protected $fillable = ['resturant_id', 'user_id', 'rating', 'comment'];

    public function resturant()
    {
        return $this->belongsTo(restaurant::class);
    }
}
