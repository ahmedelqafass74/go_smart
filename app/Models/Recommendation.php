<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    use HasFactory;

    // Specify the table name if it is different from the plural form of the model name
    protected $table = 'recommendations';

    // Specify the fields that are mass assignable
    protected $fillable = [
        'city',
        'name_place',
        'name_hotel',
        'name_rest',
        'price',
        'day',
        'rating',
    ];
    // public function scopeInCity($query, $city)
    // {
    //     return $query->where('city', 'like', "%{$city}%");
    // }
}
