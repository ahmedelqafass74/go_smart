<?php

namespace App\Imports;

use App\Models\City;
use Maatwebsite\Excel\Concerns\ToModel;

class CityImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new City([
            'city_name' => $row[0] ?? null,
            'description' => $row[1] ?? null,
            'image' => $row[2] ?? null,
        ]);
    }
}
