@php
    $colors = ['#F072B7', '#243c5a', '#49DC80', '#F59340', '#6366F1'];

    $colorsLabels = [];

    foreach (explode(',', $birthLocationLabels) as $key => $label) {
        $colorsLabels[] = $colors[$key % count($colors)];
    }
@endphp

<div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
    <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
        Tempat Lahir
    </h4>
    <canvas id="birthLocationChart" colors="{{ implode(',', $colorsLabels) }}" dataset="{{ $birthLocationsTotal }}"
        labels="{{ $birthLocationLabels }}"></canvas>
</div>
