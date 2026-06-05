<?php

namespace App\Http\Controllers;

use App\Exports\PersonsExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function export()
    {
        return Excel::download(
            new PersonsExport(),
            'persons.xlsx'
        );
    }
}