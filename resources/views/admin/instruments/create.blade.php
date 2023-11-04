<x-admin-layout pageTitle="Tambah Instrumen">
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
        <!-- Validation inputs -->
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form action="{{ route('admin.instruments.store') }}" method="POST">
                @csrf
                <x-text-input name="content" placeholder="Instrumen" type="text" label="Instrumen"
                    value="{{ old('content') }}" />
                <x-text-input name="numbering" placeholder="Penomoran" type="number" label="Penomoran"
                    value="{{ old('numbering') }}" />
                <x-text-select name="reverse" label="Reverse">
                    <option value="1">Ya</option>
                    <option value="0">Tidak</option>
                </x-text-select>
                <x-text-select name="dimension" label="SKala">
                    @foreach ($dimensions as $dimension)
                        <option @if ($dimension->id === old('dimension')) @selected(true) @endif value="{{ $dimension->id }}">
                            {{ ucwords($dimension->name) }}</option>
                    @endforeach
                </x-text-select>
                <div class="w-full lg:w-[100px]">
                    <x-guest.primary-button type="submit" class="mt-6">
                        Buat
                    </x-guest.primary-button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
