<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relaxation extends Model
{
    use HasFactory;
    protected $table = 'relaxations';
    protected $guarded = ['id'];
}
