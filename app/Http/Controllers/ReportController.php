<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function index()
    {
        $totalPersons = Person::count();

        $totalUsers = User::count();

        $districtCounts = Person::selectRaw(
            'district, COUNT(*) as total'
        )
        ->groupBy('district')
        ->get();
$dsCounts = Person::selectRaw(
    'district, ds_division, COUNT(*) as total'
)
->groupBy('district', 'ds_division')
->get();

      return view(
    'reports.index',
    compact(
        'totalPersons',
        'totalUsers',
        'districtCounts',
        'dsCounts'
    )
);
    }

    public function pdf()
    {
        $totalPersons = Person::count();

        $totalUsers = User::count();

        $districtCounts = Person::selectRaw(
            'district, COUNT(*) as total'
        )
        ->groupBy('district')
        ->get();

        $pdf = Pdf::loadView(
            'reports.pdf',
            compact(
                'totalPersons',
                'totalUsers',
                'districtCounts'
            )
        );

        return $pdf->download('summary-report.pdf');
    }
}