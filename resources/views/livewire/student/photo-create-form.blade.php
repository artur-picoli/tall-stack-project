<div>
    <label
        class="block mb-1 text-sm font-medium @error('photo') text-negative-600 @else text-gray-700 dark:text-gray-400 @enderror "
        for="file_input">Foto do aluno
    </label>
    <div class="flex mb-2">
        <div class="">
            @if ($photo && !$errors->has('photo'))
                <img class="me-3 w-10 h-10 rounded-full" src="{{ $photo->temporaryUrl() }}" alt="Extra large avatar">
            @else
            <div class="me-3" id="loadin-create" wire:loading wire:target="photo">
                <x-loading h="10" w="10" />
            </div>
            @endif
        </div>
        <div class="w-full ">
            <input wire:model="photo" wire:click="$emitSelf('newPhoto')"
                class="transition ease-in-out duration-100 focus:outline-none shadow-sm block w-full  text-sm border rounded-lg cursor-pointer @error('photo')  text-negative-900 dark:text-negative-600 placeholder-negative-300 dark:placeholder-negative-500 border border-negative-300 focus:ring-negative-500 focus:border-negative-500 dark:bg-secondary-800 dark:border-negative-600  @else placeholder-secondary-400 dark:bg-secondary-800 dark:text-secondary-400 dark:placeholder-secondary-500 border-secondary-300 focus:ring-primary-500 focus:border-primary-500 dark:border-secondary-600 @enderror"
                type="file" id="upload{{ $resetInputFile }}">
            @error('photo')
                <p class="mt-2 text-sm text-negative-600">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>
