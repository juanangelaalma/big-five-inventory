<x-counselor-layout pageTitle="Analisis">
    <x-slot name="head">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
        <script src="{{ asset('js/charts-lines.js') }}" defer></script>
        <script src="{{ asset('js/charts-pie.js') }}" defer></script>
        <script src="{{ asset('js/charts-bars.js') }}" defer></script>
    </x-slot>
    <div class="grid gap-6 mb-8 md:grid-cols-2">
        <x-gender-chart />
        <!-- Bars chart -->
        <x-average-result />
        <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
            <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
                Bars
            </h4>
            <canvas id="bars"></canvas>
            <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
                <!-- Chart legend -->
                <div class="flex items-center">
                    <span class="inline-block w-3 h-3 mr-1 bg-teal-500 rounded-full"></span>
                    <span>Shoes</span>
                </div>
                <div class="flex items-center">
                    <span class="inline-block w-3 h-3 mr-1 bg-purple-600 rounded-full"></span>
                    <span>Bags</span>
                </div>
            </div>
        </div>
    </div>
</x-counselor-layout>
