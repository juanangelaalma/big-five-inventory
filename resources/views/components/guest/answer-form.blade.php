@foreach ($instruments as $instrument)
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-8">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <div class="my-4 mx-6">
                <p>{{ $instrument->content }}</p>
                <div class="flex w-full flex-wrap justify-between lg:justify-start lg:space-x-4 mt-5 lg:mt-7">
                    <li class="relative mb-4 list-none text-sm basis-[100%] lg:basis-[15%]">
                        <input class="sr-only peer" type="radio" value="1" name="{{ "answer-$instrument->id" }}"
                            id="{{ $instrument->id }}-1">
                        <label
                            class="flex p-2 bg-white border border-gray-300 rounded-lg cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-primary-index peer-checked:text-primary-index transition-colors duration-300 peer-checked:ring-2 peer-checked:border-transparent"
                            for="{{ $instrument->id }}-1">Sangat tidak setuju</label>
                    </li>
                    <li class="relative mb-4 list-none text-sm basis-[100%] lg:basis-[15%]">
                        <input class="sr-only peer" type="radio" value="2" name="{{ "answer-$instrument->id" }}"
                            id="{{ $instrument->id }}-2">
                        <label
                            class="flex p-2 bg-white border border-gray-300 rounded-lg cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-primary-index peer-checked:text-primary-index transition-colors duration-300 peer-checked:ring-2 peer-checked:border-transparent"
                            for="{{ $instrument->id }}-2">Tidak setuju</label>
                    </li>
                    <li class="relative mb-4 list-none text-sm basis-[100%] lg:basis-[15%]">
                        <input class="sr-only peer" type="radio" value="3" name="{{ "answer-$instrument->id" }}"
                            id="{{ $instrument->id }}-3">
                        <label
                            class="flex p-2 bg-white border border-gray-300 rounded-lg cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-primary-index peer-checked:text-primary-index transition-colors duration-300 peer-checked:ring-2 peer-checked:border-transparent"
                            for="{{ $instrument->id }}-3">Netral</label>
                    </li>
                    <li class="relative mb-4 list-none text-sm basis-[100%] lg:basis-[15%]">
                        <input class="sr-only peer" type="radio" value="4" name="{{ "answer-$instrument->id" }}"
                            id="{{ $instrument->id }}-4">
                        <label
                            class="flex p-2 bg-white border border-gray-300 rounded-lg cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-primary-index peer-checked:text-primary-index transition-colors duration-300 peer-checked:ring-2 peer-checked:border-transparent"
                            for="{{ $instrument->id }}-4">Setuju</label>
                    </li>
                    <li class="relative mb-4 list-none text-sm basis-[100%] lg:basis-[15%]">
                        <input class="sr-only peer" type="radio" value="5" name="{{ "answer-$instrument->id" }}"
                            id="{{ $instrument->id }}-5">
                        <label
                            class="flex p-2 bg-white border border-gray-300 rounded-lg cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-primary-index peer-checked:text-primary-index transition-colors duration-300 peer-checked:ring-2 peer-checked:border-transparent"
                            for="{{ $instrument->id }}-5">Sangat setuju</label>
                    </li>
                </div>
                @error("answer-$instrument->id")
                    <p class="text-red-500 font-semibold mt-1 text-sm">This field is required</p>
                @enderror
            </div>
        </div>
    </div>
@endforeach
