<x-admin-layout pageTitle="Detail Pengguna">
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
        <!-- Validation inputs -->
        <div
            class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800 flex flex-col lg:flex-row w-full flex-wrap">
            <div class="w-full lg:w-1/2 lg:px-1">
                <x-text-input disabled label="Email"
                    value="{{ $user->email }}" />
            </div>
            <div class="w-full lg:w-1/2 lg:px-1">
                <x-text-input disabled label="Nama"
                    value="{{ $user->name }}" />
            </div>
            <div class="w-full lg:w-1/2 lg:px-1">
                <x-text-input disabled label="Hak Akses"
                    value="{{ translateRole($user->role) }}" />
            </div>
            <div class="w-full lg:w-1/2 lg:px-1">
                <x-text-input disabled label="NIM"
                    value="{{ avoidNullError($user->profile, 'student_number') }}" />
            </div>
            <div class="w-full lg:w-1/2 lg:px-1">
                <x-text-input disabled label="Angkatan"
                    value="{{ avoidNullError($user->profile, 'batch') }}" />
            </div>
            <div class="w-full lg:w-1/2 lg:px-1">
                <x-text-input disabled label="Prodi"
                    value="{{ avoidNullError($user->profile, 'major') }}" />
            </div>
            <div class="w-full lg:w-1/2 lg:px-1">
                <x-text-input disabled label="Jenis Kelamin"
                    value="{{ translateGender(avoidNullError($user->profile, 'gender')) }}" />
            </div>
            <div class="w-full lg:w-1/2 lg:px-1">
                <x-text-input disabled label="Tempat Lahir"
                    value="{{ avoidNullError($user->profile, 'birth_location') }}" />
            </div>
            <div class="w-full lg:w-1/2 lg:px-1">
                <x-text-input disabled label="Tanggal Lahir"
                    value="{{ avoidNullError($user->profile, 'birth_date') }}" />
            </div>
            <div class="w-full lg:w-1/2 lg:px-1">
                <x-text-input disabled label="Suku"
                    value="{{ avoidNullError($user->profile, 'ethnicity') }}" />
            </div>
        </div>
</x-admin-layout>
