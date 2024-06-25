<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $table = 'resturants';
    protected $guarded = ['id'];
    public function city()
    {
        return $this->belongsTo(city::class);
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    // public function reviews()
    // {
    //     return $this->morphMany(Review::class, 'reviewable');
    // }
    public function resturantreview()
    {
        return $this->hasMany(ResturantReview::class, 'resturant_id');
    }
}
