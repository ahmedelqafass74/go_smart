<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
//     public function __construct()
// {
//     $this->middleware('auth');
// }


    public function addReviewToCity(Request $request, $cityId)
    {
        $city = City::find($cityId);
        if (!$city) {
            return response()->json(['message' => 'City not found'], 404);
        }

        // Validate request data
        $validatedData = $request->validate([
            'rating' => ['required', 'regex:/^\d+(\.\d{1})?$/', 'between:1,5'],
            'comment' => 'nullable|string',
        ]);

        $review = new Review([
            'user_id' => auth()->id(), 
            'rating' => $validatedData['rating'],
            'comment' => $validatedData['comment'],
        ]);
        $city->reviews()->save($review);

        return response()->json(['message' => 'Review added successfully'], 201);
    }
    // public function getReviewsForCity($cityId)
    // {
    //     $city = City::find($cityId);
    //     if (!$city) {
    //         return response()->json(['message' => 'City not found'], 404);
    //     }

    //     $reviews = $city->reviews;

    //     return response()->json(['reviews' => $reviews]);
    // }

}
