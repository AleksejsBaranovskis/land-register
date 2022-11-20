<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Show all users
    public function index()
    {
        return view('users/index', [
            'users' => User::latest()->get(),
        ]);
    }

    // Show user create form
    public function create()
    {
        return view('users/create');
    }

    // Store new user
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'identification_nr/registration_nr' => ['digits:11', 'required', 'numeric']
        ]);

        User::create($data);

        return redirect('/')->with('message', 'User created successfully!');
    }

    // Show edit form
    public function edit(User $user) {
        return view('users/edit', ['user' => $user]);
    }

    // Update user
    public function update(Request $request, User $user) {
        $data = $request->validate([
            'name' => 'required',
            'type' => 'required',
            'identification_nr/registration_nr' => ['digits:11', 'required', 'numeric']
        ]);

        $user->update($data);

        return redirect('/')->with('message', 'User updated successfully!');
    }

    // Delete user
    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/')->with('message', 'User deleted successfully!');
    }
}
