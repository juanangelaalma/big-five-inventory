<x-app-layout class="bg-white">
    <div class="py-12 bg-white">
        <div class="max-w-6xl mx-auto px-6 lg:px-8">
            <h1 class="text-2xl mb-2 font-semibold">Hasil Tes Kepribadian</h1>
            <hr class="w-full">
            <div class="w-full overflow-hidden rounded-lg shadow-xs mt-4 flex flex-col lg:flex-row">
                <div class="w-full lg:w-1/2">
                    <table class="w-full">
                        <tr>
                            <td class="py-1 w-[40%]">Nama</td>
                            <td class="py-1 w-[4%] lg:w-[2%]"> : </td>
                            <td class="py-1 w-1/2"> {{ $user->name }} </td>
                        </tr>
                        <tr>
                            <td class="py-1 w-[40%]">Tanggal Lahir</td>
                            <td class="py-1 w-[4%] lg:w-[2%]"> : </td>
                            <td class="py-1 w-1/2"> {{ $user->profile->birth_date }} </td>
                        </tr>
                        <tr>
                            <td class="py-1 w-[40%]">Pendidikan</td>
                            <td class="py-1 w-[4%] lg:w-[2%]"> : </td>
                            <td class="py-1 w-1/2"> S1 </td>
                        </tr>
                    </table>
                </div>
                <div class="w-full lg:w-1/2">
                    <table class="w-full">
                        <tr>
                            <td class="py-1 w-[40%]">Tanggal Tes</td>
                            <td class="py-1 w-[4%] lg:w-[2%]"> : </td>
                            <td class="py-1 w-1/2"> {{ $answered_at }} </td>
                        </tr>
                        <tr>
                            <td class="py-1 w-[40%]">Email</td>
                            <td class="py-1 w-[4%] lg:w-[2%]"> : </td>
                            <td class="py-1 w-1/2"> {{ $user->email }} </td>
                        </tr>
                        <tr>
                            <td class="py-1 w-[40%]">Prodi</td>
                            <td class="py-1 w-[4%] lg:w-[2%]"> : </td>
                            <td class="py-1 w-1/2"> {{ $user->profile->major }} </td>
                        </tr>
                    </table>
                </div>
            </div>
            <h1 class="text-lg mb-2 font-semibold mt-6">Hasil Tes Kepribadian</h1>
            <div class="overflow-x-auto mt-4">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Dimensi</th>
                            <th class="px-4 py-3">Gambaran perilaku persentil "Rendah"</th>
                            <th class="px-4 py-3">SR*</th>
                            <th class="px-4 py-3">R*</th>
                            <th class="px-4 py-3">S*</th>
                            <th class="px-4 py-3">T*</th>
                            <th class="px-4 py-3">ST*</th>
                            <th class="px-4 py-3">Gambaran perilaku persentil "Tinggi"</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($results as $dimension => $total)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3 font-semibold">{{ $dimension }}</td>
                                <td class="px-4 py-3">Tidak ramah, tenang, tidak periang, menyendiri, task-oriented,
                                    pemalu,pendiam</td>
                                <td class="px-4 py-3 font-semibold bg-blue-50 text-center">{{ $total == 1 ? "X" : "" }}</td>
                                <td class="px-4 py-3 font-semibold">{{ $total == 2 ? "X" : "" }}</td>
                                <td class="px-4 py-3 font-semibold bg-blue-50 text-center">{{ $total == 3 ? "X" : "" }}</td>
                                <td class="px-4 py-3 font-semibold">{{ $total == 4 ? "X" : "" }}</td>
                                <td class="px-4 py-3 font-semibold bg-blue-50 text-center">{{ $total == 5 ? "X" : "" }}</td>
                                <td class="px-4 py-3">Mudah bergaul, aktif, talk-active, person- oriented, optimis,
                                    menyenangkan, kasih
                                    sayang, bersahabat
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
