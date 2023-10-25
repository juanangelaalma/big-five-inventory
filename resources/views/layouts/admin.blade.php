<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Windmill Dashboard</title> 
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <script src="{{ asset('js/init-alpine.js') }}"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"
    />
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
      defer
    ></script>
  </head>
  <body>
    <div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen }"
    >
    <x-admin.sidebar />
      <div class="flex flex-col flex-1 w-full">
        <x-admin.header />
        <main class="h-full overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            @if ($pageTitle)
              <x-admin.page-title>{{ $pageTitle }}</x-admin.page-title>
            @endif

            {{ $slot }}
          </div>
        </main>
      </div>
    </div>
  </body>
</html>
