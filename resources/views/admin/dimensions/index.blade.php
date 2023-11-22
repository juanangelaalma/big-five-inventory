<x-admin-layout pageTitle="Instrumen">
    <div class="w-1/2 lg:w-1/5 mb-5">
        <x-guest.primary-button href="{{ route('admin.dimensions.create') }}">Tambah Dimensi</x-guest.primary-button>
    </div>
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Nama</th>
                        <th class="px-4 py-3">Order</th>
                        <th class="px-4 py-3">Low Percentile Description</th>
                        <th class="px-4 py-3">High Percentile Description</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($dimensions as $dimension)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <p class="font-semibold">{{ $dimension->name }}</p>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $dimension->order }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $dimension->low_percentile_description }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $dimension->high_percentile_description }}
                            </td>
                            <td class="px-4 py-3 flex space-x-2">
                                <a href="{{ route('admin.dimensions.edit', $dimension) }}"
                                    class="text-sm bg-orange-400 px-2 py-1 rounded-md text-white font-semibold hover:bg-orange-500 transition-colors duration-200">Edit</a>
                                <form action="{{ route('admin.dimensions.destroy', $dimension) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="text-sm bg-red-400 px-2 py-1 rounded-md text-white font-semibold hover:bg-red-500 transition-colors duration-200">Delete</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
