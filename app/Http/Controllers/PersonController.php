<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonController extends Controller
{
   public function index(Request $request)
{
    $query = Person::query();

    // Name Search
    if ($request->search) {

        $query->where(
            'full_name',
            'like',
            '%' . $request->search . '%'
        );

    }

    // District Filter
    if ($request->district) {

        $query->where(
            'district',
            'like',
            '%' . $request->district . '%'
        );

    }

    // DS Division Filter
    if ($request->ds_division) {

        $query->where(
            'ds_division',
            'like',
            '%' . $request->ds_division . '%'
        );

    }

    // GN Division Filter
    if ($request->gn_division) {

        $query->where(
            'gn_division',
            'like',
            '%' . $request->gn_division . '%'
        );

    }

    $people = $query
        ->latest()
        ->paginate(10)
        ->withQueryString();

    $totalPeople = Person::count();

    $kalutaraCount = Person::where(
        'district',
        'Kalutara'
    )->count();

    $colomboCount = Person::where(
        'district',
        'Colombo'
    )->count();

    return view(
        'persons.index',
        compact(
            'people',
            'totalPeople',
            'kalutaraCount',
            'colomboCount'
        )
    );
}

    public function create()
    {
        return view('persons.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name'    => 'required|max:255',
            'age'          => 'required|numeric|min:1|max:120',
            'contact_no_1' => 'required',
            'district'     => 'required',
            'ds_division'  => 'required',
            'gn_division'  => 'required',
            'gs_wasam'     => 'required',
        ]);

        Person::create([
            'full_name'     => $request->full_name,
            'age'           => $request->age,
            'date_of_birth' => $request->date_of_birth,
            'address'       => $request->address,
            'contact_no_1'  => $request->contact_no_1,
            'contact_no_2'  => $request->contact_no_2,
            'district'      => $request->district,
            'ds_division'   => $request->ds_division,
            'gn_division'   => $request->gn_division,
            'gs_wasam'      => $request->gs_wasam,
        ]);

        return redirect('/persons')
            ->with('success', 'Person Added Successfully');
    }

   public function show(string $id)
{
    $person = Person::findOrFail($id);

    return view(
        'persons.show',
        compact('person')
    );
}

    public function edit(string $id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        $person = Person::findOrFail($id);

        return view('persons.edit', compact('person'));
    }

    public function update(Request $request, string $id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        $person = Person::findOrFail($id);

        $person->update([
            'full_name'    => $request->full_name,
            'district'     => $request->district,
            'contact_no_1' => $request->contact_no_1,
        ]);

        return redirect('/persons')
            ->with('success', 'Person Updated Successfully');
    }

    public function destroy(string $id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        Person::findOrFail($id)->delete();

        return redirect('/persons')
            ->with('success', 'Person Deleted Successfully');
    }
}