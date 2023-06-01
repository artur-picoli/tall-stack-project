<div>
    <label
        class="block mb-1 text-sm font-medium @error('editPhoto') text-negative-600 @else text-gray-700 dark:text-gray-400 @enderror "
        for="file_input">Foto do aluno
    </label>
    <div class="flex mb-2">
        <div class="">
            @if ($editPhoto && !$errors->has('editPhoto'))
                <img class="me-3 w-10 h-10 rounded-full" src="{{ $editPhoto->temporaryUrl() }}"
                    alt="Extra large avatar">
            @elseif (!empty($currentPhoto))
                <img wire:loading.attr="hidden" wire:target="editPhoto"
                    class="me-3 w-10 h-10 rounded-full" src="{{ asset($currentPhoto) }}"
                    alt="Extra large avatar">
            @endif
            <div class="me-3" id="loading-edit" wire:loading wire:target="editPhoto">
               <x-loading h="10" w="10" />
            </div>
        </div>
        <div class="w-full ">
            <input wire:model="editPhoto" wire:click="$emitSelf('newPhoto')"
                class="transition ease-in-out duration-100 focus:outline-none shadow-sm block w-full  text-sm border rounded-lg cursor-pointer @error('editPhoto')  text-negative-900 dark:text-negative-600 placeholder-negative-300 dark:placeholder-negative-500 border border-negative-300 focus:ring-negative-500 focus:border-negative-500 dark:bg-secondary-800 dark:border-negative-600  @else placeholder-secondary-400 dark:bg-secondary-800 dark:text-secondary-400 dark:placeholder-secondary-500 border-secondary-300 focus:ring-primary-500 focus:border-primary-500 dark:border-secondary-600 @enderror"
                type="file" id="upload{{ $resetInputFile }}">
            @error('editPhoto')
                <p class="mt-2 text-sm text-negative-600">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>
