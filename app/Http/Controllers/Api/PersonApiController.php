<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\User;

class PersonApiController extends Controller
{
    // GET /api/persons
    public function index()
    {
        return response()->json(Person::all());
    }

    // GET /api/persons/{id}
    public function show($id)
    {
        $person = Person::find($id);

        if (!$person) {
            return response()->json([
                'message' => 'Person not found'
            ], 404);
        }

        return response()->json($person);
    }

    // POST /api/persons
    public function store(Request $request)
    {
        $person = Person::create($request->all());

        return response()->json([
            'message' => 'Person created successfully',
            'data' => $person
        ], 201);
    }

    // PUT /api/persons/{id}
    public function update(Request $request, $id)
    {
        $person = Person::find($id);

        if (!$person) {
            return response()->json([
                'message' => 'Person not found'
            ], 404);
        }

        $person->update($request->all());

        return response()->json([
            'message' => 'Person updated successfully',
            'data' => $person
        ]);
    }

    // DELETE /api/persons/{id}
    public function destroy($id)
    {
        $person = Person::find($id);

        if (!$person) {
            return response()->json([
                'message' => 'Person not found'
            ], 404);
        }

        $person->delete();

        return response()->json([
            'message' => 'Person deleted successfully'
        ]);
    }

    // GET /api/dashboard
    public function dashboard()
    {
        return response()->json([
            'total_persons' => Person::count(),
            'total_users' => User::count(),
            'male_count' => Person::where('gender', 'Male')->count(),
            'female_count' => Person::where('gender', 'Female')->count(),
            'today_registrations' => Person::whereDate('created_at', today())->count(),
        ]);
    }

    // GET /api/persons-search?search=keyword
    public function search(Request $request)
    {
        $search = $request->search;

        $persons = Person::where('full_name', 'like', "%{$search}%")
            ->orWhere('id_card_number', 'like', "%{$search}%")
            ->orWhere('contact_no_1', 'like', "%{$search}%")
            ->get();

        return response()->json($persons);
    }
}
