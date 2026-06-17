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

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('full_name', 'like', '%' . $request->search . '%')
                  ->orWhere('id_card_number', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->district) {
            $query->where('district', 'like', '%' . $request->district . '%');
        }

        if ($request->ds_division) {
            $query->where('ds_division', 'like', '%' . $request->ds_division . '%');
        }

        if ($request->gn_division) {
            $query->where('gn_division', 'like', '%' . $request->gn_division . '%');
        }

        if ($request->gender) {
            $query->where('gender', $request->gender);
        }

        if ($request->min_age) {
            $query->where('age', '>=', $request->min_age);
        }

        if ($request->max_age) {
            $query->where('age', '<=', $request->max_age);
        }

        $people = $query->latest()
                        ->paginate(10)
                        ->withQueryString();

       $totalPeople = Person::count();

$kalutaraCount = Person::where('district', 'Kalutara')->count();

$colomboCount = Person::where('district', 'Colombo')->count();

$under18Count = Person::where('age', '<', 18)->count();

$over18Count = Person::where('age', '>=', 18)->count();

$maleCount = Person::where('gender', 'Male')->count();

$femaleCount = Person::where('gender', 'Female')->count();

return view(
'persons.index',
compact(
'people',
'totalPeople',
'kalutaraCount',
'colomboCount',
'under18Count',
'over18Count',
'maleCount',
'femaleCount'
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
            'full_name'      => 'required|max:255',
            'id_card_number' => 'nullable|unique:people,id_card_number',
            'address'        => 'required',
            'age'            => 'required|numeric|min:1|max:120',
            'contact_no_1'   => 'required',
            'district'       => 'required',
            'ds_division'    => 'required',
            'gn_division'    => 'required',
        ], [
            'address.required' =>
                'ලිපිනය ඇතුලත් කරන්න.',

            'id_card_number.unique' =>
                'මෙම ජාතික හැඳුනුම්පත් අංකය දැනටමත් පද්ධතියේ ඇත.',
        ]);

        Person::create([
            'full_name'      => $request->full_name,
            'id_card_number' => $request->id_card_number,
            'age'            => $request->age,
            'date_of_birth'  => $request->date_of_birth,
            'gender'         => $request->gender,
            'address'        => $request->address,
            'contact_no_1'   => $request->contact_no_1,
            'contact_no_2'   => $request->contact_no_2,
            'district'       => $request->district,
            'ds_division'    => $request->ds_division,
            'gn_division'    => $request->gn_division,
        ]);

        return redirect('/persons')
            ->with('success', 'Person Added Successfully');
    }

    public function show(string $id)
    {
        $person = Person::findOrFail($id);

        return view('persons.show', compact('person'));
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

        $request->validate([
            'full_name'      => 'required|max:255',
            'id_card_number' => 'nullable|unique:people,id_card_number,' . $person->id,
            
            'district'       => 'required',
            'contact_no_1'   => 'required',
        ], [
            'address.required' =>
                'ලිපිනය ඇතුලත් කරන්න.',

            'id_card_number.unique' =>
                'මෙම ජාතික හැඳුනුම්පත් අංකය දැනටමත් පද්ධතියේ ඇත.',
        ]);

       $person->update([
    'full_name'      => $request->full_name,
    'id_card_number' => $request->id_card_number,
    'age'            => $request->age,
    'date_of_birth'  => $request->date_of_birth,
    'gender'         => $request->gender,
    'address'        => $request->address,
    'contact_no_1'   => $request->contact_no_1,
    'contact_no_2'   => $request->contact_no_2,
    'district'       => $request->district,
    'ds_division'    => $request->ds_division,
    'gn_division'    => $request->gn_division,
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
