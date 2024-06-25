<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandmarkReview extends Model
{
    use HasFactory;
    protected $table = 'landmark_reviews';
    protected $fillable = ['landmark_id', 'user_id', 'rating', 'comment'];

    public function landmark()
    {
        return $this->belongsTo(landmark::class);
    }
}
