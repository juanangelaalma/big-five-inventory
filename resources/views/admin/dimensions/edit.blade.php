<x-admin-layout pageTitle="Edit Dimensi">
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
        <!-- Validation inputs -->
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <form action="{{ route('admin.dimensions.update', $dimension) }}" method="POST">
                @csrf
                @method('PUT')
                <x-text-input name="name" placeholder="Nama" type="text" label="Nama"
                    value="{{ old('name', $dimension->name) }}" />
                <x-text-input name="order" placeholder="Order" type="number" label="Order"
                    value="{{ old('order', $dimension->order) }}" />
                <label for="description" class="block text-sm my-2">
                    <span class="text-gray-700 dark:text-gray-400">Persentil Rendah</span>
                    <textarea
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input border-1 rounded-sm border-cool-gray-200"
                        name="low_percentile_description" id="low_percentile_description" placeholder="Deskripsi"
                        value="{{ old('low_percentile_description', $dimension->low_percentile_description) }}">{{ old('low_percentile_description', $dimension->low_percentile_description) }}</textarea>
                    @error('low_percentile_description')
                        <p class="text-red-500 font-semibold mt-1 text-sm">{{ $message }}</p>
                    @enderror
                </label>
                <label for="high_percentile_description" class="block text-sm my-2">
                    <span class="text-gray-700 dark:text-gray-400">Persentil Tinggi</span>
                    <textarea
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input border-1 rounded-sm border-cool-gray-200"
                        name="high_percentile_description" id="high_percentile_description" placeholder="Deskripsi"
                        value="{{ old('high_percentile_description', $dimension->high_percentile_description) }}">{{ old('high_percentile_description', $dimension->high_percentile_description) }}</textarea>
                    @error('high_percentile_description')
                        <p class="text-red-500 font-semibold mt-1 text-sm">{{ $message }}</p>
                    @enderror
                </label>
                <div class="w-full lg:w-[100px]">
                    <x-guest.primary-button type="submit" class="mt-6">
                        Buat
                    </x-guest.primary-button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
