<div class="bg-white py-8 px-6 rounded-md grid grid-cols-4 gap-y-4">
    @foreach ($completeness as $key => $item)
        <a href="{{ route('instruments.answer', ['lastAnswer' => $item['lastAnswer']]) }}">
            <div
                class="w-14 h-14 border border-gray-300 rounded cursor-pointer flex justify-center items-center {{ $item['filled'] ? 'bg-green-400 text-white' : '' }}">
                <span class="text-lg">{{ $key + 1 }}</span>
            </div>
        </a>
    @endforeach
</div>
