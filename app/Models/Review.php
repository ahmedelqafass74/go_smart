<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'reviews';
    protected $guarded = ['id'];
    public function reviewable()
{
    return $this->morphTo();
}
public function user()
    {
        return $this->belongsTo(User::class);
    }
}
