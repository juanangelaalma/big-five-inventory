@props(['href' => null])

<x-guest.primary-button href="{{ $href }}" class="lg:py-3 bg-white border-1 border-purple-800 hover:bg-purple-50">
    <span class="text-purple-800 font-normal">
        {{ $slot }}
    </span>
</x-guest.primary-button>