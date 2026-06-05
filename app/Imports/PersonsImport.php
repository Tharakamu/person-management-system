<?php

namespace App\Imports;

use App\Models\Person;
use Maatwebsite\Excel\Concerns\ToModel;

class PersonsImport implements ToModel
{
    public function model(array $row)
    {
        return new Person([

            'full_name'     => $row[1],
            'age'           => $row[2],
            'date_of_birth' => $row[3],
            'address'       => $row[4],
            'contact_no_1'  => $row[5],
            'contact_no_2'  => $row[6],
            'district'      => $row[7],
            'ds_division'   => $row[8],
            'gn_division'   => $row[9],
            'gs_wasam'      => $row[10],

        ]);
    }
}