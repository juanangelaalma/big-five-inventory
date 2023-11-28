<x-admin-layout pageTitle="Analisis">
    <div class="w-full">
        <x-slot name="head">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
            <script src="{{ asset('js/charts-lines.js') }}" defer></script>
            <script src="{{ asset('js/charts-gender.js') }}" defer></script>
            <script src="{{ asset('js/charts-result.js') }}" defer></script>
            <script src="{{ asset('js/charts-age.js') }}" defer></script>
            <script src="{{ asset('js/charts-batch.js') }}" defer></script>
        </x-slot>
    </div>
    <x-filter-analyst action="{{ route('admin.analyst.filter') }}" />
    <div class="grid gap-6 mb-8 md:grid-cols-2">
        <x-gender-chart />
        <x-average-result />
        <x-average-bar />
        <x-age-chart />
        <x-batch-chart />
    </div>
</x-admin-layout>
