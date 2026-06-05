<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        if (auth()->user()->role != 'admin') {
            abort(403);
        }

        $users = User::latest()->paginate(10);

        return view('users.index', compact('users'));
    }

    public function updateRole(Request $request, $id)
    {
        if (auth()->user()->role != 'admin') {
            abort(403);
        }

        $user = User::findOrFail($id);

        $user->role = $request->role;
        $user->save();

        return back()->with(
            'success',
            'User role updated successfully'
        );
    }

    public function destroy($id)
    {
        if (auth()->user()->role != 'admin') {
            abort(403);
        }

        User::findOrFail($id)->delete();

        return back()->with(
            'success',
            'User deleted successfully'
        );
    }
}