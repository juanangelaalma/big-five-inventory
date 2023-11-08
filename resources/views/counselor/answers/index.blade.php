<x-counselor-layout pageTitle="Hasil Pengisian">
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Nama</th>
                        <th class="px-4 py-3">NIM</th>
                        <th class="px-4 py-3">Jenis Kelamin</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($users as $user)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <p class="font-semibold">{{ $user->name }}</p>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $user->email }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ translateGender(avoidNullError($user->profile, 'gender')) }}
                            </td>
                            <td class="px-4 py-3 flex space-x-2">
                                <a href="{{ route('admin.users.show', $user) }}"
                                    class="text-sm bg-green-400 px-2 py-1 rounded-md text-white font-semibold hover:bg-green-500 transition-colors duration-200">Hasil</a>
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
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
        {{-- {{ $users->links() }} --}}
    </div>
</x-counselor-layout>
