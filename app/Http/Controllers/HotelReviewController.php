<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\HotelReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HotelReviewController extends Controller
{
    public function AddReviewToHotel(Request $request, $hotelId)
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
        $review = new HotelReview();
        $review->hotel_id = $hotelId;
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
    public function GetReviewsForHotel($hotelId)
    {
        $hotel = Hotel::findOrFail($hotelId);
        $reviews = $hotel->hotelreview()->get();

        return response()->json([
            'hotel' => $hotel,
            'reviews' => $reviews
        ], 200);
}
}
