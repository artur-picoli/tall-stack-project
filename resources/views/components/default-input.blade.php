<div>
    <label for="{{ $name }}"
        class="block mb-2 text-sm font-medium @error($wireModel ?? $name) text-red-700 dark:text-red-500 @else text-gray-900 dark:text-white @enderror ">{{ $label }}</label>
    <input wire:model.lazy="{{ $wireModel ?? $name }}" type="{{ $type }}" id="{{ $name }}"
        name="{{ $name }}"
        class=" text-sm rounded-lg block w-full bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white border p-2.5 @error($wireModel ?? $name)  border-red-500  placeholder-gray-400  focus:ring-red-500 focus:border-red-500 dark:focus:ring-red-500 dark:focus:border-red-500  dark:border-red-400 @else border-gray-300 dark:border-gray-600  dark:placeholder-gray-400  focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-500 dark:focus:border-blue-500   @enderror"
        placeholder="{{ $placeHolder ?? "" }}">
</div>
@error($wireModel ?? $name)
    <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
@enderror
