@props(['user', 'answered_at', 'results', 'hidepdfdownload' => false])

<div class="py-12 bg-white">
    <div class="mx-auto px-6 lg:px-8">
        <div class="flex flex-row mb-2">
            <h1 class="text-2xl font-semibold">Hasil Tes Kepribadian</h1>
            @if (!$hidepdfdownload)
            <a href="{{ request()->getRequestUri() . '/pdf' }}"
                class="flex ml-auto mr-0 justify-center items-end space-x-2 px-4 py-2 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <g fill="none" fill-rule="evenodd">
                        <path
                            d="M24 0v24H0V0h24ZM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018Zm.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022Zm-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01l-.184-.092Z" />
                        <path fill="currentColor"
                            d="M13.586 2a2 2 0 0 1 1.284.467l.13.119L19.414 7a2 2 0 0 1 .578 1.238l.008.176V20a2 2 0 0 1-1.85 1.995L18 22H6a2 2 0 0 1-1.995-1.85L4 20V4a2 2 0 0 1 1.85-1.995L6 2h7.586ZM12 4H6v16h12V10h-4.5a1.5 1.5 0 0 1-1.493-1.356L12 8.5V4Zm.988 7.848a6.223 6.223 0 0 0 2.235 3.872c.887.717.076 2.121-.988 1.712a6.223 6.223 0 0 0-4.47 0c-1.065.41-1.876-.995-.989-1.712a6.222 6.222 0 0 0 2.235-3.872c.178-1.127 1.8-1.126 1.977 0Zm-.99 2.304l-.688 1.196h1.38l-.691-1.196ZM14 4.414V8h3.586L14 4.414Z" />
                    </g>
                </svg>
                <span>PDF</span>
            </a>
            @endif
        </div>
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
                    @foreach ($results as $result)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 font-semibold">{{ $result->name }}</td>
                            <td class="px-4 py-3">
                                {{ $result->low_percentile_description }}
                            </td>
                            <td class="px-4 py-3 font-semibold bg-blue-50 text-center">
                                {{ $result->score == 1 ? 'X' : '' }}</td>
                            <td class="px-4 py-3 font-semibold">{{ $result->score == 2 ? 'X' : '' }}</td>
                            <td class="px-4 py-3 font-semibold bg-blue-50 text-center">
                                {{ $result->score == 3 ? 'X' : '' }}</td>
                            <td class="px-4 py-3 font-semibold">{{ $result->score == 4 ? 'X' : '' }}</td>
                            <td class="px-4 py-3 font-semibold bg-blue-50 text-center">
                                {{ $result->score == 5 ? 'X' : '' }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $result->high_percentile_description }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
