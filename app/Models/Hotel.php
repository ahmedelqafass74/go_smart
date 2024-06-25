<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $table = 'hotels';
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

    public function hotelreview()
    {
        return $this->hasMany(HotelReview::class);
    }



    // public function scopeInCity($query, $city)
    // {
    //     return $query->whereHas('city', function ($query) use ($city) {
    //         $query->where('name', 'like', "%{$city}%");
    //     });
    // }
}
