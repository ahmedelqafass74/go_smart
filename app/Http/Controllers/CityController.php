<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Landmark;
use App\Models\Restaurant;
use App\Models\City;
use App\Models\Recommendation;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class CityController extends Controller
{
    public function getCityData(Request $request)
    {
        $city = $request->input('city');
        $numDays = $request->input('days', 3);

        if (!$city) {
            return response()->json(['error' => 'City parameter is required'], 400);
        }

            $cityExists = City::where('city_name', 'like', "%{$city}%")->exists();
// dd($cityExists);
            if (!$cityExists) {
                return response()->json(['error' => 'City not found'], 404);
            }

        $hotels = QueryBuilder::for(Hotel::class)
            ->allowedFilters([
                AllowedFilter::partial('city'),
                'hotel_name',
                'rating',
            ])
            ->whereHas('city', function($query) use ($city) {
                $query->where('city_name', 'like', "%{$city}%");
            })
            ->limit($numDays)
            ->get();

        $landmarks = QueryBuilder::for(Landmark::class)
            ->allowedFilters([
                AllowedFilter::partial('city')
            ])
            ->whereHas('city', function($query) use ($city) {
                $query->where('city_name', 'like', "%{$city}%");
            })
            ->get();

        $restaurants = QueryBuilder::for(Restaurant::class)
            ->allowedFilters([
                AllowedFilter::partial('city')
            ])
            ->whereHas('city', function($query) use ($city) {
                $query->where('city_name', 'like', "%{$city}%");
            })
            ->get();

        $recommendations = QueryBuilder::for(Recommendation::class)
            ->allowedFilters([
                AllowedFilter::partial('city'),
                'name_place',
                'name_hotel',
                'name_rest',
                'rating',
            ])
            ->where('city', 'like', "%{$city}%")
            ->get();

        $response = [
            'hotel' => [
                'data' => []
            ]
        ];

        foreach ($hotels as $index => $hotel) {
            $response['hotel']['data'][] = [
                'hotel_name' => $hotel->hotel_name,
                'plan' => 'day' . ($index + 1),
                'restaurant' => [
                    'restaurantdata' => $restaurants[$index]->toArray() ?? []
                ],
                'land_mark' => [
                    'landmarkdata' => $landmarks[$index]->toArray() ?? []
                ],

            ];
        }

        return response()->json($response);
    }
}
