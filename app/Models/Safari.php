<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Safari extends Model
{
    use HasFactory;
    protected $table = 'safaris';
    protected $guarded = ['id'];
}
