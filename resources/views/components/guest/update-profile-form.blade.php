<form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
    @csrf
    @method('patch')

    <div>
        <x-text-input id="name" label="Nama" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
            required autofocus autocomplete="name" />
    </div>

    <div>
        <x-text-input id="email" label="Email" name="email" type="email" class="mt-1 block w-full"
            :value="old('email', $user->email)" required autocomplete="username" />

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
            <div>
                <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                    {{ __('Your email address is unverified.') }}

                    <button form="send-verification"
                        class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                    <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            </div>
        @endif
    </div>

    <div>
        <x-text-input id="student_number" label="NIM" name="student_number" type="text" class="mt-1 block w-full"
            :value="old('student_number', avoidNullError($user->profile, 'student_number'))" autocomplete="student_number" />
    </div>

    <div>
        <x-text-input id="batch" label="Angkatan" name="batch" type="text" class="mt-1 block w-full"
            :value="old('batch', avoidNullError($user->profile, 'batch'))" autocomplete="batch" />
    </div>

    <div>
        <x-text-input id="major" label="Prodi" name="major" type="text" class="mt-1 block w-full"
            :value="old('major', avoidNullError($user->profile, 'major'))" autocomplete="major" />
    </div>

    <div>
        <x-text-select name="gender" label="Role">
            <option @if (old('gender', avoidNullError($user->profile, 'gender')) === 'male') @selected(true) @endif value="male">Laki-laki</option>
            <option @if (old('gender', avoidNullError($user->profile, 'gender')) === 'female') @selected(true) @endif value="female">Perempuan</option>
        </x-text-select>
    </div>

    <div>
        <x-text-input id="birth_location" label="Tempat Lahir" name="birth_location" type="text"
            class="mt-1 block w-full" :value="old('birth_location', avoidNullError($user->profile, 'birth_location'))" autocomplete="birth_location" />
    </div>

    <div>
        <x-text-input id="birth_date" label="Tanggal Lahir" name="birth_date" type="date" class="mt-1 block w-full"
            :value="old('birth_date', avoidNullError($user->profile, 'birth_date'))" autocomplete="birth_date" />
    </div>

    <div>
        <x-text-input id="ethnicity" label="Suku" name="ethnicity" type="text" class="mt-1 block w-full"
            :value="old('ethnicity', avoidNullError($user->profile, 'ethnicity'))" autocomplete="ethnicity" />
    </div>

    <div class="flex items-center gap-4">
        <div class="w-full lg:w-[100px]">
            <x-guest.primary-button>{{ __('Save') }}</x-guest.primary-button>
        </div>

        @if (session('status') === 'profile-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
        @endif
    </div>
</form>
