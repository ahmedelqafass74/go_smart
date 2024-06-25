<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table = 'cities';
    protected $guarded = ['id'];
    public function landmarks()
{
    return $this->hasMany(Landmark::class);
}
public function restaurants()
{
    return $this->hasMany(Restaurant::class);
}
public function hotels()
{
    return $this->hasMany(Hotel::class);
}
public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    // public function reviews()
    // {
    //     return $this->morphMany(Review::class, 'reviewable');
    // }
    public function cityreview()
    {
        return $this->hasMany(CityReview::class);
    }
}
