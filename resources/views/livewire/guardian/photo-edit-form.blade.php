<div>
    <label
        class="block mb-1 text-sm font-medium @error('editPhoto') text-negative-600 @else text-gray-700 dark:text-gray-400 @enderror "
        for="file_input">Foto do Responsável
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
                <svg aria-hidden="true"
                    class="w-9 h-10 rounded-full text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                        fill="currentColor" />
                    <path
                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                        fill="currentFill" />
                </svg>
                <span class="sr-only">Loading...</span>
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
