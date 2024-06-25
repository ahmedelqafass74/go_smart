<?php

namespace App\Imports;

use App\Models\Relaxation;
use Maatwebsite\Excel\Concerns\ToModel;

class RelaxationImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Relaxation([
            'city_name' => $row[0] ?? null,
            'description' => $row[1] ?? null,
            'image' => $row[2] ?? null,
        ]);
    }
}
