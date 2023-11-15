<x-admin-layout pageTitle="Edit User">
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
        <!-- Validation inputs -->
        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            <div
                class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 flex flex-col lg:flex-row w-full flex-wrap">
                @method('PUT')
                @csrf
                <div class="w-full lg:w-1/2 lg:px-1">
                    <x-text-input name="email" label="Email" value="{{ $user->email }}" />
                </div>
                <div class="w-full lg:w-1/2 lg:px-1">
                    <x-text-input name="name" label="Nama" value="{{ $user->name }}" />
                </div>
                <div class="w-full lg:w-1/2 lg:px-1 pt-2">
                    <x-text-select name="role" label="Role" class="mt-0">
                        @foreach ($roles as $role)
                            <option @if ($role === $user->role) @selected(true) @endif
                                value="{{ $role }}">
                                {{ ucwords($role) }}</option>
                        @endforeach
                    </x-text-select>
                </div>
                <div class="w-full lg:w-1/2 lg:px-1">
                    <x-text-input name="student_number" label="NIM"
                        value="{{ avoidNullError($user->profile, 'student_number') }}" />
                </div>
                <div class="w-full lg:w-1/2 lg:px-1">
                    <x-text-input name="batch" label="Angkatan"
                        value="{{ avoidNullError($user->profile, 'batch') }}" />
                </div>
                <div class="w-full lg:w-1/2 lg:px-1">
                    <x-text-input name="major" label="Jurusan"
                        value="{{ avoidNullError($user->profile, 'major') }}" />
                </div>
                <div class="w-full lg:w-1/2 lg:px-1 pt-2">
                    <x-text-select name="gender" label="Jenis Kelamin" class="mt-0">
                        <option @if (old('gender', avoidNullError($user->profile, 'gender')) === 'male') @selected(true) @endif value="male">
                            Laki-laki</option>
                        <option @if (old('gender', avoidNullError($user->profile, 'gender')) === 'female') @selected(true) @endif value="female">
                            Perempuan</option>
                    </x-text-select>
                </div>
                <div class="w-full lg:w-1/2 lg:px-1">
                    <x-text-input name="birth_location" label="Tempat Lahir"
                        value="{{ avoidNullError($user->profile, 'birth_location') }}" />
                </div>
                <div class="w-full lg:w-1/2 lg:px-1">
                    <x-text-input name="birth_date" type="date" label="Tanggal Lahir"
                        value="{{ avoidNullError($user->profile, 'birth_date') }}" />
                </div>
                <div class="w-full lg:w-1/2 lg:px-1">
                    <x-text-input name="ethnicity" label="Suku"
                        value="{{ avoidNullError($user->profile, 'ethnicity') }}" />
                </div>
            </div>
            <div class="w-[120px]">
                <x-guest.primary-button class="lg:py-3" type="submit">Save</x-guest.primary-button>
            </div>
        </form>
</x-admin-layout>
