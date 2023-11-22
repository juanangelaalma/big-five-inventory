<ul>
    <x-admin.sidebar-link href="{{ route('admin.index') }}" title="Dashboard" class="mt-5"
        active="{{ request()->is('admin') ? 'active' : '' }}">
        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            viewBox="0 0 24 24" stroke="currentColor">
            <path
                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
            </path>
        </svg>
    </x-admin.sidebar-link>
    <x-admin.sidebar-link href="{{ route('admin.users') }}" title="Users"
        active="{{ request()->is('admin/users*') ? 'active' : '' }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
            <g fill="none" stroke="currentColor" stroke-width="1.5">
                <circle cx="12" cy="6" r="4" />
                <path stroke-linecap="round"
                    d="M19.997 18c.003-.164.003-.331.003-.5c0-2.485-3.582-4.5-8-4.5s-8 2.015-8 4.5S4 22 12 22c2.231 0 3.84-.157 5-.437" />
            </g>
        </svg>
    </x-admin.sidebar-link>
    <x-admin.sidebar-link href="{{ route('admin.dimensions') }}" title="Dimensi"
        active="{{ request()->is('admin/dimensions*') ? 'active' : '' }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path fill="currentColor"
                d="M6.5 11L12 2l5.5 9h-11Zm11 11q-1.875 0-3.188-1.313T13 17.5q0-1.875 1.313-3.188T17.5 13q1.875 0 3.188 1.313T22 17.5q0 1.875-1.313 3.188T17.5 22ZM3 21.5v-8h8v8H3ZM17.5 20q1.05 0 1.775-.725T20 17.5q0-1.05-.725-1.775T17.5 15q-1.05 0-1.775.725T15 17.5q0 1.05.725 1.775T17.5 20ZM5 19.5h4v-4H5v4ZM10.05 9h3.9L12 5.85L10.05 9ZM12 9Zm-3 6.5Zm8.5 2Z" />
        </svg>
    </x-admin.sidebar-link>
    <x-admin.sidebar-link href="{{ route('admin.instruments') }}" title="Instrumen"
        active="{{ request()->is('admin/instruments*') ? 'active' : '' }}">
        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
            stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
            <path
                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
            </path>
        </svg>
    </x-admin.sidebar-link>
    <x-admin.sidebar-link href="" title="Hasil Analisis"
        active="{{ request()->is('admin/instruments*') ? 'active' : '' }}">
        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
            stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
            <path d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
        </svg>
    </x-admin.sidebar-link>
</ul>
