<x-admin-layout pageTitle="Instrumen">
    <div class="w-1/2 lg:w-1/5 mb-5">
        <x-guest.primary-button href="{{ route('admin.instruments.create') }}">Tambah Instrumen</x-guest.primary-button>
    </div>
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Instrumen</th>
                        <th class="px-4 py-3">Nomor</th>
                        <th class="px-4 py-3">Reverse</th>
                        <th class="px-4 py-3">Dimensi</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($instruments as $instrument)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <p class="font-semibold">{{ $instrument->content }}</p>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $instrument->numbering }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                              {{ $instrument->reverse ? 'True' : 'False' }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                              {{ avoidNullError($instrument->dimension, 'name') }}
                            </td>
                            <td class="px-4 py-3 flex space-x-2">
                                <a href="{{ route('admin.instruments.edit', $instrument) }}"
                                    class="text-sm bg-orange-400 px-2 py-1 rounded-md text-white font-semibold hover:bg-orange-500 transition-colors duration-200">Ubah</a>
                                <form action="{{ route('admin.instruments.destroy', $instrument) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="text-sm bg-red-400 px-2 py-1 rounded-md text-white font-semibold hover:bg-red-500 transition-colors duration-200">Hapus</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
