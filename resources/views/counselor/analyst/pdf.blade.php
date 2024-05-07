<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ env('APP_NAME') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <script src="{{ asset('js/init-alpine.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.2/chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.0.0/chartjs-plugin-datalabels.min.js"></script>
    <script src="{{ asset('js/charts-lines.js') }}" defer></script>
    <script src="{{ asset('js/charts-gender.js') }}" defer></script>
    <script src="{{ asset('js/charts-result.js') }}" defer></script>
    <script src="{{ asset('js/charts-age.js') }}" defer></script>
    <script src="{{ asset('js/charts-batch.js') }}" defer></script>
    <script src="{{ asset('js/charts-major.js') }}" defer></script>
    <script src="{{ asset('js/charts-birth-location.js') }}" defer></script>
</head>

<body>
    <h1 class="mx-auto text-center text-4xl font-bold mt-8 mb-8">Grafik Hasil Analisis</h1>
    <div class="grid gap-6 mb-8 md:grid-cols-2 p-6">
        @if ($charts)
            @foreach ($charts as $chart)
                <x-dynamic-component :component="$chart" />
            @endforeach
        @else
            <x-gender-chart />
            <x-average-result />
            <x-average-bar />
            <x-age-chart />
            <x-batch-chart />
            <x-major-chart />
            <x-birth-location-chart />
        @endif
    </div>
</body>

</html>
