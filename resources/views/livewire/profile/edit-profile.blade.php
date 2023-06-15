<x-default-card>
    <div class="flex gap-3 mb-2">
        @if ($photo && !$errors->has('photo'))
            <img wire:loading.attr="hidden" wire:target="photo" class="w-10 h-10 rounded-full"
                src="{{ $photo->temporaryUrl() }}" alt="Extra large avatar">
        @elseif($userPhoto)
            <img wire:loading.attr="hidden" wire:target="photo" class="w-10 h-10 rounded-full"
                src="{{ asset($userPhoto) }}" alt="Extra large avatar">
        @else
            <div wire:loading.attr="hidden" wire:target="photo"
                class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                <svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
        @endif
        <div id="loading-profile" wire:loading wire:target="photo">
            <x-loading h="10" w="10" />
        </div>
        <div>
            <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Edição de Perfil
            </h5>
        </div>
    </div>
    <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
        Atualize as informações de sua conta e seu endereço de e-mail
    </p>
    <form wire:submit.prevent="update" class="space-y-6">
        <div>
            <label
                class="block text-sm font-medium @error('photo') text-negative-600 @else text-gray-700 dark:text-gray-400 @enderror "
                for="file_input">Foto de
                perfil
            </label>
            <input wire:model="photo"
                class="  transition ease-in-out duration-100 focus:outline-none shadow-sm block w-full  text-sm border rounded-lg cursor-pointer @error('photo')  text-negative-900 dark:text-negative-600 placeholder-negative-300 dark:placeholder-negative-500 border-negative-300 focus:ring-negative-500 focus:border-negative-500 dark:bg-secondary-800 dark:border-negative-600  @else placeholder-secondary-400 dark:bg-secondary-800 dark:text-secondary-400 dark:placeholder-secondary-500 border-secondary-300 focus:ring-primary-500 focus:border-primary-500 dark:border-secondary-600 @enderror"
                type="file">
            @error('photo')
                <p class="mt-2 text-sm text-negative-600">{{ $message }}</p>
            @enderror
        </div>
        <x-input wire:model.lazy="name" label="Nome" />

        <x-input wire:model.lazy="email" label="E-mail" />

        <x-inputs.password  wire:model.lazy="passwordConfirm" label="Confirme sua senha" placeholder="" />

        <x-button wire:click="update" spinner="update" primary label="Salvar" />
    </form>
</x-default-card>
