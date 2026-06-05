<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function export(Request $request)
    {
        $district = $request->district;

        $people = Person::when($district, function ($query) use ($district) {
            return $query->where('district', $district);
        })->get();

        $totalPeople = $people->count();

        $districtCounts = Person::selectRaw('district, COUNT(*) as total')
            ->groupBy('district')
            ->get();

        $userCount = User::count();

        $pdf = Pdf::loadView(
            'persons.pdf',
            compact(
                'people',
                'district',
                'totalPeople',
                'districtCounts',
                'userCount'
            )
        );

        return $pdf->download('persons-summary-report.pdf');
    }
}