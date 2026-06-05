<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\PersonsImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function showImportForm()
    {
        return view('persons.import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(
            new PersonsImport(),
            $request->file('excel_file')
        );

        return redirect('/persons')
            ->with('success', 'Excel Imported Successfully');
    }
}