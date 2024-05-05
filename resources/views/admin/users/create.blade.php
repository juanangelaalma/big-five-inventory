<x-admin-layout pageTitle="Tambah Pengguna">
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
        <!-- Validation inputs -->
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <x-text-input name="email" placeholder="Email" type="email" label="Email" value="{{ old('email') }}" />
                <x-text-input name="password" placeholder="Password" type="password" label="Password"
                    value="{{ old('password') }}" />
                <x-text-input name="name" placeholder="Nama" type="text" label="Nama"
                    value="{{ old('name') }}" />
                <x-text-select name="role" label="Hak Akses">
                    @foreach ($roles as $role)
                        <option @if ($role === old('role')) @selected(true) @endif value="{{ $role }}">
                            {{ translateRole($role) }}</option>
                    @endforeach
                </x-text-select>
                <div class="w-full lg:w-[100px]">
                    <x-guest.primary-button type="submit" class="mt-6">
                        Masuk
                    </x-guest.primary-button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
