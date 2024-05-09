@props(['action' => '', 'start_date' => '', 'end_date' => '', 'major' => '', 'gender' => '', 'dateonly' => false])

<form action="{{ $action }}" method="POST">
    @csrf
    <div class="bg-white w-full mb-4 p-6">
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
        @if (!$dateonly)
            <div class="flex w-full">
                <div class="w-1/2 pr-2">
                    <x-text-input name="major" type="text" value="{{ $major }}" placeholder="Prodi"
                        label="Prodi" />
                </div>
                <div class="w-1/2 pl-2">
                    <x-text-select name="gender" class="mt-2" label="Jenis Kelamin">
                        <option value="">
                            Pilih...
                        </option>
                        <option @if ($gender === 'male') @selected(true) @endif value="male">
                            Laki-laki
                        </option>
                        <option @if ($gender === 'female') @selected(true) @endif value="female">
                            Perempuan
                        </option>
                    </x-text-select>
                </div>
            </div>
        @endif
        <button
            class="block px-4 py-2 w-[100px] ml-auto mr-0 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 border border-transparent rounded-lg focus:outline-none {{ getPathLevel() === 'admin' ? 'bg-purple-600 focus:shadow-outline-purple active:bg-purple-600 hover:bg-purple-700' : 'bg-green-600 focus:shadow-outline-green active:bg-green-600 hover:bg-green-700' }}">
            Terapkan
        </button>
    </div>
</form>
