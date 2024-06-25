<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'city',
        'phoneNo',
        'gender',
        'year_of_birth',
        'contact_link',
        'car_type',
        'language',
        'description',
    ];
}
