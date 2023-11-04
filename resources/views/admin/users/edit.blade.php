<x-admin-layout pageTitle="Edit User">
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
        <!-- Validation inputs -->
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form action="{{ route('admin.users.update', $user) }}" method="POST">
                @method('PUT')
                @csrf
                <x-text-input disabled name="email" placeholder="Email" type="email" label="Email"
                    value="{{ $user->email }}" />
                <x-text-input name="name" placeholder="Nama" type="text" label="Nama"
                    value="{{ $user->name }}" />
                <x-text-select name="role" label="Role">
                    @foreach ($roles as $role)
                        <option @if ($role === $user->role) @selected(true) @endif value="{{ $role }}">
                            {{ ucwords($role) }}</option>
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
