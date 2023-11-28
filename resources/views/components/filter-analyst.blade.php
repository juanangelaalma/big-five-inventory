@props(['action' => '', 'start_date' => '', 'end_date' => '', 'major' => '', 'gender' => ''])

<form action="{{ $action }}" method="POST">
    @csrf
    <div class="bg-white w-full mb-4 p-6" x-data="{ showMoreFilter: true }">
        <h4 class="font-semibold">Filter berdasarkan</h4>
        <div class="flex w-full">
            <div class="w-1/2 pr-2">
                <x-text-input name="start_date" type="date" value="{{ $start_date }}" placeholder="Tanggal minimum"
                    label="Tanggal minimum" />
            </div>
            <div class="w-1/2 pl-2">
                <x-text-input name="end_date" type="date" value="{{ $end_date }}" placeholder="Tanggal maksimum"
                    label="Tanggal maksimum" />
            </div>
        </div>
        <div class="flex w-full flex-wrap" x-show="showMoreFilter" x-transition>
            <div class="mt-4">
                <h4 class="mb-3 font-semibold">Grafik yang ingin ditampilkan</h4>
                <div class="flex items-center space-x-3">
                    <input type="checkbox" id="checkbox-chart-gender" name="chart-gender">
                    <label for="checkbox-chart-gender">Jenis Kelamin</label>
                </div>
                <div class="flex items-center space-x-3">
                    <input type="checkbox" id="checkbox-chart-result" name="chart-result">
                    <label for="checkbox-chart-result">Hasil Analisis</label>
                </div>
                <div class="flex items-center space-x-3">
                    <input type="checkbox" id="checkbox-chart-major" name="chart-major">
                    <label for="checkbox-chart-major">Prodi</label>
                </div>
                <div class="flex items-center space-x-3">
                    <input type="checkbox" id="checkbox-chart-batch" name="chart-batch">
                    <label for="checkbox-chart-batch">Angkatan</label>
                </div>
                <div class="flex items-center space-x-3">
                    <input type="checkbox" id="checkbox-chart-age" name="chart-age">
                    <label for="checkbox-chart-age">Umur Responden</label>
                </div>
            </div>
        </div>
        <div class="flex justify-end items-center w-full">
            <button type="button" x-text="showMoreFilter ? 'Hide more filter' : 'Show more'"
                @click="showMoreFilter = !showMoreFilter"
                class="px-4 py-2 mt-4 text-sm text-blue-700 font-semibold">Show more filter</button>
            <button
                class="block px-4 py-2 w-[100px] mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 border border-transparent rounded-lg focus:outline-none {{ getPathLevel() === 'admin' ? 'bg-purple-600 focus:shadow-outline-purple active:bg-purple-600 hover:bg-purple-700' : 'bg-green-600 focus:shadow-outline-green active:bg-green-600 hover:bg-green-700' }}">
                Terapkan
            </button>
        </div>
    </div>
</form>