<?php

namespace App\Exports;

use App\Models\Person;
use Maatwebsite\Excel\Concerns\FromCollection;

class PersonsExport implements FromCollection
{
    public function collection()
    {
        return Person::all();
    }
}
