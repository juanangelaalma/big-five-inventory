@props(['action' => '', 'startdate' => '', 'enddate' => '', 'major' => '', 'gender' => '', 'charts' => null])

<form action="{{ $action }}" method="POST">
    @csrf
    <div class="bg-white w-full mb-4 p-6" x-data="{ showMoreFilter: true }">
        <h4 class="font-semibold">Filter berdasarkan</h4>
        <div class="flex w-full">
            <div class="w-1/2 pr-2">
                <x-text-input name="start-date" type="date" value="{{ $startdate }}" placeholder="Tanggal minimum"
                    label="Tanggal minimum" />
            </div>
            <div class="w-1/2 pl-2">
                <x-text-input name="end-date" type="date" value="{{ $enddate }}" placeholder="Tanggal maksimum"
                    label="Tanggal maksimum" />
            </div>
        </div>
        <div class="flex w-full flex-wrap" x-show="showMoreFilter" x-transition>
            <div class="mt-4">
                <h4 class="mb-3 font-semibold">Grafik yang ingin ditampilkan</h4>
                <div class="flex items-center space-x-3">
                    <input type="checkbox" id="checkbox-chart-gender" name="gender-chart" @checked(in_array('gender-chart', $charts))>
                    <label for="checkbox-chart-gender">Jenis Kelamin</label>
                </div>
                <div class="flex items-center space-x-3">
                    <input type="checkbox" id="checkbox-chart-result" name="average-result" @checked(in_array('average-result', $charts))>
                    <label for="checkbox-chart-result">Hasil Analisis</label>
                </div>
                <div class="flex items-center space-x-3">
                    <input type="checkbox" id="checkbox-chart-average-bar" name="average-bar" @checked(in_array('average-bar', $charts))>
                    <label for="checkbox-chart-average-bar">Bar Hasil Analisis</label>
                </div>
                <div class="flex items-center space-x-3">
                    <input type="checkbox" id="checkbox-chart-major" name="major-chart" @checked(in_array('major-chart', $charts))>
                    <label for="checkbox-chart-major">Prodi</label>
                </div>
                <div class="flex items-center space-x-3">
                    <input type="checkbox" id="checkbox-chart-batch" name="batch-chart" @checked(in_array('batch-chart', $charts))>
                    <label for="checkbox-chart-batch">Angkatan</label>
                </div>
                <div class="flex items-center space-x-3">
                    <input type="checkbox" id="checkbox-chart-age" name="age-chart" @checked(in_array('age-chart', $charts))>
                    <label for="checkbox-chart-age">Umur Responden</label>
                </div>
                <div class="flex items-center space-x-3">
                    <input type="checkbox" id="checkbox-chart-birth-location" name="birth-location-chart" @checked(in_array('birth-location-chart', $charts))>
                    <label for="checkbox-chart-birth-location">Tempat Lahir Responden</label>
                </div>
            </div>
        </div>
        <div class="flex justify-end items-center w-full">
            <a href="{{ route(getPathLevel() . '.analyst.pdf', request()->all()) }}" target="__blank" class="flex ml-auto mr-0 justify-center items-end space-x-2 px-4 mt-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 border border-transparent rounded-lg focus:outline-none focus:shadow-outline-purple {{ getPathLevel() === 'admin' ? 'bg-purple-600 focus:shadow-outline-purple active:bg-purple-600 hover:bg-purple-700' : 'bg-green-600 focus:shadow-outline-green active:bg-green-600 hover:bg-green-700' }}"">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <g fill="none" fill-rule="evenodd">
                        <path d="M24 0v24H0V0h24ZM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01l-.184-.092Z" />
                        <path fill="currentColor" d="M13.586 2a2 2 0 0 1 1.284.467l.13.119L19.414 7a2 2 0 0 1 .578 1.238l.008.176V20a2 2 0 0 1-1.85 1.995L18 22H6a2 2 0 0 1-1.995-1.85L4 20V4a2 2 0 0 1 1.85-1.995L6 2h7.586ZM12 4H6v16h12V10h-4.5a1.5 1.5 0 0 1-1.493-1.356L12 8.5V4Zm.988 7.848a6.223 6.223 0 0 0 2.235 3.872c.887.717.076 2.121-.988 1.712a6.223 6.223 0 0 0-4.47 0c-1.065.41-1.876-.995-.989-1.712a6.222 6.222 0 0 0 2.235-3.872c.178-1.127 1.8-1.126 1.977 0Zm-.99 2.304l-.688 1.196h1.38l-.691-1.196ZM14 4.414V8h3.586L14 4.414Z" />
                        </g>
                    </svg>
            </a>
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
