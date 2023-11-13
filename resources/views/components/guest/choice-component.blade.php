@props(['name' => '', 'id' => '', 'point' => '', 'label' => '', 'value' => ''])

<li class="list-none flex items-center">
    <input value="{{ $value }}" type="radio" class="sr-only peer" name="{{ $name }}" id="{{ $id }}" {{ $selected == 'true' ? 'checked' : '' }} />
    <label for="{{ $id }}"
        class="flex justify-center items-center w-10 h-10 border-gray-300 border rounded cursor-pointer focus:outline-none hover:bg-gray-50 peer-checked:ring-purple-600 peer-checked:text-white peer-checked:bg-purple-600 transition-colors duration-300 peer-checked:ring-2 peer-checked:border-transparent">
        {{ $point }}
    </label>
    <label for="{{ $id }}" class="pl-4 cursor-pointer">{{ $label }}</label>
</li>
