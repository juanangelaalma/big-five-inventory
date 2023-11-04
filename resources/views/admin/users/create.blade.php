<x-admin-layout pageTitle="Tambah User">
  <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
      <!-- Validation inputs -->
      <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
          <form action="{{ route('admin.users.save', $user) }}" method="POST">
              @csrf
              <x-text-input name="email" placeholder="Email" type="email" label="Email"
                  value="{{ old('email') }}" />
              <x-text-input name="password" placeholder="Password" type="password" label="Password"
                  value="{{ old('password') }}" />
              <x-text-input name="name" placeholder="Nama" type="text" label="Nama"
                  value="{{ old('name') }}" />
              <label class="block mt-4 text-sm">
                  <span class="text-gray-700 dark:text-gray-400">
                      Role
                  </span>
                  <select name="role"
                      class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input border-1 rounded-sm border-cool-gray-200">
                      @foreach ($roles as $role)
                          <option @if ($role === old('role')) @selected(true) @endif
                              value="{{ $role }}">
                              {{ ucwords($role) }}</option>
                      @endforeach
                  </select>
              </label>
              <div class="w-full lg:w-[100px]">
                  <x-guest.primary-button type="submit" class="mt-6">
                      Masuk
                  </x-guest.primary-button>
              </div>
          </form>
      </div>
  </div>
</x-admin-layout>
