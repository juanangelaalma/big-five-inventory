<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Profile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $profile = Profile::where('user_id', $request->user()->id)->first();

        if (!$profile) {
            $profile = new Profile();
            $profile->user_id = $request->user()->id;
        }

        if ($request->file('profilePicture')) {
            $request->validate([
                'profilePicture'  => 'mimes:png,jpg,jpeg,webp|max:2048',
            ]);

            $fileName = time() . '.' . $request->file('profilePicture')->extension();
            $request->file('profilePicture')->storeAs('/uploads/users/', $fileName, 'public');

            $profile->profile_picture = '/storage/uploads/users/' . $fileName;
        }

        $profile->student_number = $request->student_number;
        $profile->batch = $request->batch;
        $profile->major = $request->major;
        $profile->gender = $request->gender;
        $profile->birth_location = $request->birth_location;
        $profile->birth_date = $request->birth_date;
        $profile->ethnicity = $request->ethnicity;
        $profile->save();

        $request->user()->save();

        return back()->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
