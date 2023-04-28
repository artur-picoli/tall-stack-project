<x-default-card>
    <div class="flex gap-3 mb-2">
        @if ($photo && !$errors->has('photo'))
            <img class="w-12 h-12 rounded-full" src="{{ $photo->temporaryUrl() }}" alt="Extra large avatar">
        @else
            <div class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                <svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
        @endif
        <div>
            <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Aluno
            </h5>
        </div>
    </div>
    <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
        Dados do aluno
    </p>
    <form wire:submit.prevent="save" class="space-y-6">
        <x-default-input-file name="photo" label="Foto do aluno"/>

        <x-default-input name="name" type="text" label="Nome"/>

        <x-default-input name="email" type="text" label="E-mail"/>

        <div>
            <x-short-button wireTarget="save" buttonText="Salvar"/>
        </div>
    </form>
</x-default-card>
