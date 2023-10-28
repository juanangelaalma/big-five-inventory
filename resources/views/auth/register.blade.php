<x-guest-layout title="Register">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
            <div class="flex flex-col overflow-y-auto md:flex-row">
                <div class="h-32 md:h-auto md:w-1/2">
                    <img aria-hidden="true" class="object-cover w-full h-full dark:hidden"
                        src="https://static.vecteezy.com/system/resources/previews/000/429/840/original/vector-mental-health-and-psychology-concept.jpg"
                        alt="Brain" />
                    <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block"
                        src="../assets/img/create-account-office-dark.jpeg" alt="Office" />
                </div>
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                        <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                            Buat akun
                        </h1>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <x-text-input name="name" value="{{ old('name') }}" placeholder="Nama Lengkap" type="text"
                                label="Nama Lengkap" />
                            <x-text-input name="email" value="{{ old('email') }}" placeholder="Email" type="email" label="Email" />
                            <x-text-input name="password" type="password" placeholder="Password" label="Password" />
                            <x-text-input name="birth_location" value="{{ old('birth_location') }}" type="text" placeholder="Tempat Lahir"
                                label="Tempat Lahir" />
                            <x-text-input name="birth_date" value="{{ old('birth_date') }}" type="date" placeholder="Tanggal Lahir"
                                label="Tanggal Lahir" />
                            <input id="male" type="radio" name="gender" value="male" class="mr-2"><label
                                for="male" class="mr-2 text-sm">Laki-laki</label>
                            <input id="female" type="radio" name="gender" value="female" class="mr-2"><label
                                for="female" class="mr-2 text-sm">Perempuan</label>
                            <x-guest.primary-button type="submit" class="mt-6">
                                Buat Akun
                            </x-guest.primary-button>
                        </form>

                        <p class="mt-4">
                            <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                                href="{{ route('login') }}">
                                Sudah punya akun? Login
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
