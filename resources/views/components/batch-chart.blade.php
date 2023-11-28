@php
    $colors = ['#F59340', '#6366F1', '#49DC80', '#F072B7', '#243c5a'];

    $colorsLabels = [];

    foreach (explode(',', $batchLabels) as $key => $label) {
        $colorsLabels[] = $colors[$key % count($colors)];
    }
@endphp

<div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
    <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
        Angkatan
    </h4>
    <canvas id="batchChart" colors="{{ implode(',', $colorsLabels) }}" dataset="{{ $batchsTotal }}"
        labels="{{ $batchLabels }}"></canvas>
    <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
        <!-- Chart legend -->
        @foreach (explode(',', $batchLabels) as $key => $label)
            <div class="flex items-center">
                <span class="inline-block w-3 h-3 mr-1 rounded-full" style="background: {{$colors[$key]}}"></span>
                <span>{{ $label }}</span>
            </div>
        @endforeach
    </div>
</div>
