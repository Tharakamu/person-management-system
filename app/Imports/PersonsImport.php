<?php

namespace App\Imports;

use App\Models\Person;
use Maatwebsite\Excel\Concerns\ToModel;

class PersonsImport implements ToModel
{
    public function model(array $row)
{
    if (!isset($row[1])) {
        return null;
    }

    return new Person([

        'full_name'     => $row[1] ?? null,
        'age'           => $row[2] ?? null,
        'date_of_birth' => $row[3] ?? null,
        'address'       => $row[4] ?? null,
        'contact_no_1'  => $row[5] ?? null,
        'contact_no_2'  => $row[6] ?? null,
        'district'      => $row[7] ?? null,
        'ds_division'   => $row[8] ?? null,
        'gn_division'   => $row[9] ?? null,
        'gs_wasam'      => $row[10] ?? null,

    ]);
}
}