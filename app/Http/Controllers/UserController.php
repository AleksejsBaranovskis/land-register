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
        $user = User::where(['identification_nr/registration_nr' => $request['identification_nr/registration_nr']])
            ->first();

        if(!$user) {
            $data = $request->validate([
                'name' => 'required',
                'type' => 'required',
                'identification_nr/registration_nr' => ['digits:11', 'required', 'numeric']
            ]);

            User::create($data);

            return redirect('/')->with('message', 'User created successfully!');
        } else {
            return back()->with('message', 'User already exist!');
        }
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

        return back()->with('message', 'User deleted successfully!');
    }

    // Show users without land properties
    public function showUsersWithoutProperties()
    {
        $users = User::all();
        $userWithoutProperties = [];
        foreach ($users as $user) {
            if (count($user->landProperty) == 0) {
                $userWithoutProperties [] = $user;
            }
        }

        return view('users/users-without-properties', [
            'users' => $userWithoutProperties
        ]);
    }
}
