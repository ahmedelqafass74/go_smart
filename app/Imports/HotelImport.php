<?php

namespace App\Imports;

use App\Models\Hotel;
use Maatwebsite\Excel\Concerns\ToModel;

class HotelImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Hotel([
            'city' => $row[0] ?? null,
            'image1' => $row[1] ?? null,
            'image2' => $row[2] ?? null,
            'image3' => $row[3] ?? null,
            'hotel_name' => $row[4] ?? null,
            'rating' => $row[5] ?? null,
            'url_google_map' => $row[6] ?? null,
            'website' => $row[7] ?? null,
            'city_id' => $row[8] ?? null,
        ]);
    }
}
