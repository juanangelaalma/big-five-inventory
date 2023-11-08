<aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
            {{ config('app.name') }}
        </a>
        <ul>
            <x-counselor.sidebar-link href="{{ route('counselor.index') }}" title="Dashboard" class="mt-5"
                active="{{ request()->is('counselor') ? 'active' : '' }}">
                <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
            </x-counselor.sidebar-link>
            <x-counselor.sidebar-link href="{{ route('counselor.index') }}" title="Hasil Analisis"
                active="{{ request()->is('counselor.analist.results') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                    <path fill="currentColor" fill-rule="evenodd"
                        d="M1.5 14H15v-1H2V0H1v13.5l.5.5zM3 11.5v-8l.5-.5h2l.5.5v8l-.5.5h-2l-.5-.5zm2-.5V4H4v7h1zm6-9.5v10l.5.5h2l.5-.5v-10l-.5-.5h-2l-.5.5zm2 .5v9h-1V2h1zm-6 9.5v-6l.5-.5h2l.5.5v6l-.5.5h-2l-.5-.5zm2-.5V6H8v5h1z"
                        clip-rule="evenodd" />
                </svg>
            </x-counselor.sidebar-link>
            <x-counselor.sidebar-link href="{{ route('counselor.index') }}" title="Hasil Pengisian"
                active="{{ request()->is('counselor.answers') ? 'active' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 32 32">
                    <g fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 9h4m-4 7h12m-12 4h12m-12 4h4m-6 5h16a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v22a2 2 0 0 0 2 2Z" />
                        <circle cx="22" cy="9" r=".5" fill="currentColor" />
                    </g>
                </svg>
            </x-counselor.sidebar-link>
        </ul>
        <div class="px-6 my-6">
            <button
                class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">
                Create account
                <span class="ml-2" aria-hidden="true">+</span>
            </button>
        </div>
    </div>
</aside>
