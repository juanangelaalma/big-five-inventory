<x-guest-layout title="Login">
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
                            Masuk Akun
                        </h1>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <x-text-input name="email" placeholder="Email" type="email" label="Email" value="{{ old('email') }}" />
                            <x-text-input name="password" type="password" placeholder="Password" label="Password" />
                            <x-guest.primary-button type="submit" class="mt-6">
                                Masuk
                            </x-guest.primary-button>
                        </form>
                        <p class="mt-4">
                            <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                                href="{{ route('register') }}">
                                Belum punya akun? Register
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
