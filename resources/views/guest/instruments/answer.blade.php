<x-app-layout>
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            @if ($user->hasCompleteProfile())
                <form action="{{ route('instruments.answer.submit') }}" method="POST">
                    @csrf
                    <x-guest.answer-form :is-last-instrument="$isLastInstrument" :instruments="$instruments" />
                </form>
            @else
                <x-alert type="warning" message="Mohon lengkapi profil terlebih dahulu" />
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Profile') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Lengkapi profil dahulu!') }}
                            </p>
                        </header>
                        <x-guest.update-profile-form :user="$user" />
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
