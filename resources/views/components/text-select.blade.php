@props(['disabled' => false, 'label' => false, 'name' => ''])

<label {{ $attributes->merge(['class' => 'block mt-4 text-sm']) }}>
    <span class="text-gray-700 dark:text-gray-400">
        {{ $label }}
    </span>
    <select name="{{ $name }}"
        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input border-1 rounded-sm border-cool-gray-200">
        {{ $slot }}
    </select>
    @error($name)
        <p class="text-red-500 font-semibold mt-1 text-sm">{{ $message }}</p>
    @enderror
</label>
