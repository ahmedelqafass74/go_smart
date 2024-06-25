<?php

namespace App\Imports;

use App\Models\Diving;
use Maatwebsite\Excel\Concerns\ToModel;

class DivingImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Diving([
            'city_name' => $row[0] ?? null,
            'description' => $row[1] ?? null,
            'image' => $row[2] ?? null,
        ]);
    }
}
