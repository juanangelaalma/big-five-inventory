@php
    $colors = ['#F072B7', '#243c5a', '#49DC80', '#F59340', '#6366F1'];

    $colorsLabels = [];

    foreach (explode(',', $majorLabels) as $key => $label) {
        $colorsLabels[] = $colors[$key % count($colors)];
    }
@endphp

<div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
    <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
        Program Studi
    </h4>
    <canvas id="majorChart" colors="{{ implode(',', $colorsLabels) }}" dataset="{{ $majorsTotal }}"
        labels="{{ $majorLabels }}"></canvas>
    <div class="flex justify-center flex-wrap space-y-2 mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
        <!-- Chart legend -->
        @foreach (explode(',', $majorLabels) as $key => $label)
            <div class="flex items-center">
                <span class="inline-block w-3 h-3 mr-1 rounded-full" style="background: {{$colorsLabels[$key]}}"></span>
                <span class="text-xs">{{ $label }}</span>
            </div>
        @endforeach
    </div>
</div>
