<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Windmill Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <script src="{{ asset('js/init-alpine.js') }}"></script>
    @if (isset($head))
        {{ $head }}
    @endif
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <x-counselor.sidebar />
        <div class="flex flex-col flex-1 w-full">
            <x-counselor.header />
            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                    @if ($pageTitle)
                        <x-counselor.page-title>{{ $pageTitle }}</x-counselor.page-title>
                    @endif

                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
</body>

</html>
