<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class All_hotel extends Model
{
    use HasFactory;
    protected $table = 'all_hotels';
    protected $guarded = ['name'];

}
