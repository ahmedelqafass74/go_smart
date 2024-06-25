<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\CityReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewCity extends Controller
{
    public function addReviewToCity(Request $request, $cityId)
    {
        $rules = [
            'rating' => 'required|numeric|min:1|max:5',
            'comment' => 'string|max:1000',
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }
        $review = new CityReview();
        $review->city_id = $cityId;
        $review->user_id = auth()->id(); 
        $review->rating = $request->input('rating');
        $review->comment = $request->input('comment');
        $review->save();

        return response()->json([
            'message' => 'Review added successfully.',
            'review' => $review
        ], 201);
    }

    // Method to retrieve reviews for a specific city
    public function getReviewsForCity($cityId)
    {
        $city = City::findOrFail($cityId);
        $reviews = $city->cityreview()->get();

        return response()->json([
            'city' => $city,
            'reviews' => $reviews
        ], 200);
}
}
