<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    public function users()
    {
        $currentUser = Auth::user();
        $users = User::with('profile')->whereNot('id', $currentUser->id)->get();
        return view('admin.users.index', compact('users'));
    }

    public function show(User $user) {
        return view('admin.users.details', compact('user'));
    }

    public function create(User $user)
    {
        $roles = User::ROLES;
        return view('admin.users.create', compact('user', 'roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', Rules\Password::defaults()],
            'role' => 'required|in:' . implode(',', User::ROLES),
        ]);

        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->name = $request->name;
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
            'role' => 'required|in:' . implode(',', User::ROLES)
        ]);

        $user->name = $request->name;
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
