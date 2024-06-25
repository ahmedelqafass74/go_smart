<?php

namespace App\Imports;

use App\Models\HistoricalCity;
use Maatwebsite\Excel\Concerns\ToModel;

class HistoricalCityImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new HistoricalCity([
            'city_name' => $row[0] ?? null,
            'description' => $row[1] ?? null,
            'image' => $row[2] ?? null,
        ]);
    }
}
