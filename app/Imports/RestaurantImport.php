<?php

namespace App\Imports;

use App\Models\Restaurant;
use Maatwebsite\Excel\Concerns\ToModel;

class RestaurantImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Restaurant([
            'address' => $row[0] ?? null,
            'city' => $row[1] ?? null,
            'description' => $row[2] ?? null,
            'image' => $row[3] ?? null,
            'resturant_name' => $row[4] ?? null,
            'rating' => $row[5] ?? null,
            'website' => $row[6] ?? null,
            'city_id' => $row[7] ?? null,
        ]);
    }
}
