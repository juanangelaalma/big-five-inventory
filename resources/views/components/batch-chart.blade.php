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
    <div class="lg:p-20">
        <canvas id="batchChart" colors="{{ implode(',', $colorsLabels) }}" dataset="{{ $batchsTotal }}"
            labels="{{ $batchLabels }}"></canvas>
    </div>
</div>
