<div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
    <h4 class="mb-4 font-semibold text-gray-800 dark:text-gray-300">
        Jenis Kelamin Responden
    </h4>
    <canvas id="genderChart" dataset="{{ $gendersTotal }}" labels="{{ $genderLabels }}"></canvas>
    <div class="flex justify-center mt-4 space-x-3 text-sm text-gray-600 dark:text-gray-400">
        <!-- Chart legend -->
        <div class="flex items-center">
            <span class="inline-block w-3 h-3 mr-1 bg-blue-600 rounded-full"></span>
            <span>Laki-laki</span>
        </div>
        <div class="flex items-center">
            <span class="inline-block w-3 h-3 mr-1 bg-teal-500 rounded-full"></span>
            <span>Perempuan</span>
        </div>
    </div>
</div>
