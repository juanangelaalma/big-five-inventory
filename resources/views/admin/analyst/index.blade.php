<x-admin-layout pageTitle="Hasil Analisis">
    <div class="w-full">
        <x-slot name="head">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
            <script src="{{ asset('js/charts-lines.js') }}" defer></script>
            <script src="{{ asset('js/charts-gender.js') }}" defer></script>
            <script src="{{ asset('js/charts-result.js') }}" defer></script>
            <script src="{{ asset('js/charts-age.js') }}" defer></script>
            <script src="{{ asset('js/charts-batch.js') }}" defer></script>
            <script src="{{ asset('js/charts-major.js') }}" defer></script>
            <script src="{{ asset('js/charts-birth-location.js') }}" defer></script>
        </x-slot>
    </div>
    <x-filter-analyst :charts="$charts" action="{{ route('admin.analyst.filter') }}" :startdate="$start_date" :enddate="$end_date" />
    <div class="grid gap-6 mb-8 md:grid-cols-2">
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
</x-admin-layout>
