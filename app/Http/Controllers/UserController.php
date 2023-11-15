<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function users()
    {
        $currentUser = Auth::user();
        $users = User::with('profile')->whereNot('id', $currentUser->id)->get();
        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
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
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
            'role' => 'required|in:' . implode(',', User::ROLES),
            'student_number' => ['nullable', 'string', 'max:50', Rule::unique(Profile::class)->ignore($user->id, 'user_id')],
            'batch' => ['nullable', 'integer'],
            'major' => ['nullable', 'string', 'max:100'],
            'gender' => ['nullable', 'string', 'in:male,female'],
            'birth_location' => ['nullable', 'string', 'max:100'],
            'birth_date' => ['nullable', 'date'],
            'ethnicity' => ['nullable', 'string', 'max:100'],
        ]);

        $profile = Profile::firstOrCreate(
            ['user_id' => $user->id],
        );

        $user->name = $request->name;
        $user->role = $request->role;

        $profile->student_number = $request->student_number;
        $profile->batch = $request->batch;
        $profile->major = $request->major;
        $profile->gender = $request->gender;
        $profile->birth_location = $request->birth_location;
        $profile->birth_date = $request->birth_date;
        $profile->ethnicity = $request->ethnicity;

        $profile->save();

        $user->save();

        return back();
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }
}
