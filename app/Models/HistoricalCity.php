<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricalCity extends Model
{
    use HasFactory;
    protected $table = 'historical_cities';
    protected $guarded = ['id'];

}
