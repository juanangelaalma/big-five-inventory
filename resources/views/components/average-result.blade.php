<div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
    <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
        Rata-rata hasil analisis
    </h4>
    <table class="w-full whitespace-no-wrap">
        <thead>
            <tr
                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 dark:bg-gray-800">
                <th class="px-4 py-3">Dimensi</th>
                <th class="px-4 py-3">Rata-rata</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @php
                $sum = 0
            @endphp
            @foreach ($results as $dimension => $result)
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3 text-sm">
                        {{ $dimension }}
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                            <p class="font-semibold">{{ $result['total'] }}</p>
                        </div>
                    </td>
                </tr>
                @php
                    $sum += $result['total']
                @endphp
            @endforeach
            <tr class="text-gray-700 dark:text-gray-400 border-t-gray-400">
                <td class="px-4 py-3 text-sm font-semibold">
                    Hasil
                </td>
                <td class="px-4 py-3">
                    <div class="flex items-center text-sm">
                        <p class="font-semibold">{{ count($results) > 0 ? $sum / count($results) : 0 }}</p>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
