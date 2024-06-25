<?php

namespace App\Imports;

use App\Models\Landmark;
use Maatwebsite\Excel\Concerns\ToModel;

class LandmarkImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Landmark([
            'image' => $row[0] ?? null,
            'landmark_name' => $row[1] ?? null,
            'description' => $row[2] ?? null,
            'address' => $row[3] ?? null,
            'city' => $row[4] ?? null,
            'city_id' => $row[5] ?? null,
        ]);
    }
}
