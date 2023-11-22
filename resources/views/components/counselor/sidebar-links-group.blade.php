<ul>
    <x-counselor.sidebar-link href="{{ route('counselor.index') }}" title="Dashboard" class="mt-5"
        active="{{ request()->is('counselor') ? 'active' : '' }}">
        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            viewBox="0 0 24 24" stroke="currentColor">
            <path
                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
            </path>
        </svg>
    </x-counselor.sidebar-link>
    <x-counselor.sidebar-link href="{{ route('counselor.analyst') }}" title="Hasil Analisis"
        active="{{ request()->is('counselor.analyst') ? 'active' : '' }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
            <path fill="currentColor" fill-rule="evenodd"
                d="M1.5 14H15v-1H2V0H1v13.5l.5.5zM3 11.5v-8l.5-.5h2l.5.5v8l-.5.5h-2l-.5-.5zm2-.5V4H4v7h1zm6-9.5v10l.5.5h2l.5-.5v-10l-.5-.5h-2l-.5.5zm2 .5v9h-1V2h1zm-6 9.5v-6l.5-.5h2l.5.5v6l-.5.5h-2l-.5-.5zm2-.5V6H8v5h1z"
                clip-rule="evenodd" />
        </svg>
    </x-counselor.sidebar-link>
    <x-counselor.sidebar-link href="{{ route('counselor.answers') }}" title="Hasil Pengisian"
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
