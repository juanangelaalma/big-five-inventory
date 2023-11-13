@php
    $no = 1;
    $lastAnswer = !$isLastInstrument ? $instruments[$instruments->count() - 1]->numbering : 0;

    function selected($instrument, $score) {
        return ($instrument->answers->count() > 0) ? (($instrument->answers[0]->score == $score) ? 'true' : 'false') : 'false';
    }
@endphp

<div class="flex flex-wrap space-y-4 lg:space-y-0">
    <div class="w-full lg:w-1/3 px-4">
        <div class="bg-white py-8 px-6 rounded-md grid grid-cols-4 gap-y-4">
            @for ($i = 1; $i < 13; $i++)
                <div
                    class="w-14 h-14 border border-gray-300 rounded cursor-pointer flex justify-center items-center bg-purple-600 text-white">
                    <span class="text-lg">{{ $i }}</span>
                </div>
            @endfor
        </div>
    </div>
    <div class="w-full lg:w-2/3 px-4">
        @if (!$isLastInstrument)
            @foreach ($instruments as $instrument)
                <div class="bg-white w-full overflow-hidden shadow-sm rounded-md mb-8">
                    <div class="py-8 px-6">
                        <p class="text-gray-900">
                            <span>{{ $instrument->numbering }}. </span>
                            {{ $instrument->content }}
                        </p>
                        <div class="mt-6 space-y-4 lg:mt-8">
                            <x-guest.choice-component :selected="selected($instrument, 5)" :id="$instrument->id . '-5'" :name="'answer-' . $instrument->id" value="5" point="A"
                                label="Sangat setuju" />
                            <x-guest.choice-component :selected="selected($instrument, 4)" :id="$instrument->id . '-4'" :name="'answer-' . $instrument->id" value="4" point="B"
                                label="Setuju" />
                            <x-guest.choice-component :selected="selected($instrument, 3)" :id="$instrument->id . '-3'" :name="'answer-' . $instrument->id" value="3" point="C"
                                label="Netral" />
                            <x-guest.choice-component :selected="selected($instrument, 2)" :id="$instrument->id . '-2'" :name="'answer-' . $instrument->id" value="2" point="D"
                                label="Tidak setuju" />
                            <x-guest.choice-component :selected="selected($instrument, 1)" :id="$instrument->id . '-1'" :name="'answer-' . $instrument->id" value="1" point="E"
                                label="Sangat tidak setuju" />
                        </div>
                    </div>
                </div>
            @endforeach
        @else
        <div class="bg-white w-full overflow-hidden shadow-sm rounded-md mb-8">
            <div class="py-8 px-6">
            <div>Last Instrument</div>
            </div>
        </div>
        @endif
        <div class="w-full flex justify-between">
            <input type="hidden" value="{{ $lastAnswer }}" name="lastAnswer">
            <div class="w-[120px]">
                <x-guest.default-button href="javascript:history.back()">Previous</x-guest.default-button>
            </div>
            <div class="w-[120px]">
                <x-guest.primary-button class="lg:py-3" type="submit">Next</x-guest.primary-button>
            </div>
        </div>
    </div>
</div>
