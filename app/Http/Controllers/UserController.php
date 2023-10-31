<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function users()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create(User $user)
    {
        $roles = User::ROLES;
        return view('admin.users.create', compact('user', 'roles'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', Rules\Password::defaults()],
            'birth_location' => 'required|max:255',
            'birth_date' => 'required|date',
            'gender' => 'required|in:male,female',
            'role' => 'required|in:' . implode(',', User::ROLES),
        ]);

        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->name = $request->name;
        $user->birth_location = $request->birth_location;
        $user->birth_date = $request->birth_date;
        $user->gender = $request->gender;
        $user->role = $request->role;
        $user->save();

        return redirect()->route('admin.users');
    }

    public function edit(User $user)
    {
        $roles = User::ROLES;
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|max:255',
            'birth_location' => 'required|max:255',
            'birth_date' => 'required|date',
            'gender' => 'required|in:male,female',
            'role' => 'required|in:' . implode(',', User::ROLES)
        ]);

        $user->name = $request->name;
        $user->birth_location = $request->birth_location;
        $user->birth_date = $request->birth_date;
        $user->gender = $request->gender;
        $user->role = $request->role;
        $user->save();

        return back();
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }
}
