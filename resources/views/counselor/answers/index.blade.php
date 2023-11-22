<x-counselor-layout pageTitle="Hasil Pengisian">
    <form action="{{ route('counselor.answers.filter') }}" method="POST">
        @csrf
        <div class="bg-white w-full mb-4 p-6">
            <h4 class="font-semibold">Filter berdasarkan</h4>
            <div class="flex w-full">
                <div class="w-1/2 pr-2">
                    <x-text-input name="start_date" type="date" value="{{ $start_date }}"
                        placeholder="Tanggal minimum" label="Tanggal minimum" />
                </div>
                <div class="w-1/2 pl-2">
                    <x-text-input name="end_date" type="date" value="{{ $end_date }}"
                        placeholder="Tanggal maksimum" label="Tanggal maksimum" />
                </div>
            </div>
            <div class="flex w-full">
                <div class="w-1/2 pr-2">
                    <x-text-input name="major" type="text" value="{{ $major }}" placeholder="Prodi"
                        label="Prodi" />
                </div>
                <div class="w-1/2 pl-2">
                    <x-text-select name="gender" class="mt-2" label="Role">
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
            <button
                class="block px-4 py-2 w-[100px] ml-auto mr-0 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">
                Terapkan
            </button>
        </div>
    </form>
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Nama</th>
                        <th class="px-4 py-3">Jenis Kelamin</th>
                        <th class="px-4 py-3">Prodi</th>
                        <th class="px-4 py-3">Tanggal Pengisian</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($answer_statuses as $answer_status)
                        @if ($answer_status->answers->count() > 0)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 text-sm">
                                    {{ $answer_status->answers[0]->user->email }}
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <p class="font-semibold">{{ $answer_status->answers[0]->user->name }}</p>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ translateGender(avoidNullError($answer_status->answers[0]->user->profile, 'gender')) }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ avoidNullError($answer_status->answers[0]->user->profile, 'major') }}
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    {{ $answer_status->created_at }}
                                </td>
                                <td class="px-4 py-3 flex space-x-2">
                                    <a href="{{ route('counselor.answers.details', $answer_status->id) }}"
                                        class="text-sm bg-green-400 px-2 py-1 rounded-md text-white font-semibold hover:bg-green-500 transition-colors duration-200">Hasil</a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-counselor-layout>
