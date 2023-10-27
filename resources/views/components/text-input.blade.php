@props(['disabled' => false, 'label' => false, 'name' => ''])

<label class="block text-sm my-2">
  @if ($label)
    <span class="text-gray-700 dark:text-gray-400">{{ $label }}</span>
  @endif
  <input
    {!! $attributes->merge(['class' => 'block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input border-1 rounded-sm border-cool-gray-200']) !!}
    {{ $disabled ? 'disabled' : '' }}
    name={{ $name }}
  />
  @error($name)
    <p class="text-red-500 font-semibold mt-1 text-sm">{{ $message }}</p>
  @enderror
</label>