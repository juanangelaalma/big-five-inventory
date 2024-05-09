<x-counselor-layout pageTitle="Hasil Prediksi">
    <x-filter-result
        :startdate="$start_date"
        :enddate="$end_date"
        :major="$major"
        :gender="$gender"
        action="{{ route('counselor.answers.filter') }}" />
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
                        <th class="px-4 py-3">Aksi</th>
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
            <div class="p-2">
                {{ $answer_statuses->links() }}
            </div>
        </div>
    </div>
</x-counselor-layout>
