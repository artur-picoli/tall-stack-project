<div>
    <x-modal.card title="Alunos do Responsável" blur wire:model="modalBindGuardianStudent"
        x-on:close="closeModalBindGuardianStudent">
        <div class="grid grid-cols-1">
            <div class="w-full max-w-sm bg-transparent border border-transparent rounded-lg shado mx-auto">
                <div class="flex flex-col items-center pb-10">
                    @if ($guardian->photo)
                        <img class="w-24 h-24 mb-3 rounded-full shadow-lg mt-3" src="{{ asset($guardian->photo) }}"
                            alt="avatar" />
                    @else
                        <div class="relative w-24 h-24 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600 mt-3">
                            <svg class="absolute  text-gray-400 -left-1" style="width:100px; height:120px"
                                fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                    clip-rule="evenodd">
                                </path>
                            </svg>
                        </div>
                    @endif
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $guardian->name }}</h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">{{ $guardian->document_type }}:
                        {{ format_document($guardian->identification_document, $guardian->getRawOriginal('document_type')) }}</span>
                </div>
            </div>
            @if ($openSearchStudent)
                <div
                    class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-4 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <div class="inline-flex items-center">
                            <x-button.circle flat icon="arrow-left" wire:click="$set('openSearchStudent', false)" />
                            <h5 class="text-lg font-bold leading-none text-gray-900 dark:text-white">Vincular
                                Aluno
                            </h5>
                        </div>
                        <div class="inline-flex items-center">
                            <div role="status" wire:loading wire:target="searchStudent">
                                <svg aria-hidden="true"
                                    class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
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
                            <x-input icon="search" wire:model="searchStudent" placeholder="Buscar Aluno" />
                        </div>
                    </div>
                    @if (count($this->arrSearchStudent) > 0)
                        <div class="flow-root">
                            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($this->arrSearchStudent as $student)
                                    <li class="py-3 sm:py-4">
                                        <div class="flex items-center space-x-4">
                                            <div class="flex-shrink-0">
                                                @if ($student->photo)
                                                    <img class="w-10 h-10 rounded-full"
                                                        src="{{ asset($student->photo) }}" alt="avatar">
                                                @else
                                                    <div
                                                        class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                                        <svg class="absolute w-12 h-12 text-gray-400 -left-1"
                                                            fill="currentColor" viewBox="0 0 20 20"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                                clip-rule="evenodd">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                    {{ $student->name }}
                                                </p>
                                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                    {{ $student->email }}
                                                </p>
                                            </div>
                                            <div>
                                                <div class="gap-2">
                                                    <p class="text-sm text-gray-500 truncate dark:text-gray-400"
                                                        style="text-align: center;">
                                                        Vincular como:
                                                    </p>
                                                    <x-button xs primary label="Master"
                                                        wire:click="confirmBindStudent({{ $student->id }}, 1)" />
                                                    <x-button xs secondary label="Normal"
                                                        wire:click="confirmBindStudent({{ $student->id }}, 2)" />
                                                </div>
                                            </div>

                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="w-full mt-2">
                            {{ $this->arrSearchStudent->links() }}
                        </div>
                    @elseif (count($this->arrSearchStudent) == 0 && !empty($this->searchStudent))
                        <div class="justify-start p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <div class="flex">
                                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                    <span class="font-medium">
                                        Nenhum aluno localizado. Clique no botão abaixo para ir ao cadastro de
                                        alunos.
                                    </span>
                                </div>
                            </div>
                            <div class="mt-2 text-center">
                                <x-button href="{{ route('alunos') }}" primary label="Cadastrar" />
                            </div>
                        </div>
                    @endif
                </div>
            @endif
            @if (!$openSearchStudent)
                <div
                    class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-4 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4">
                        <h5 class="text-lg font-bold leading-none text-gray-900 dark:text-white">Alunos
                            vinculados</h5>
                        <x-button icon="plus" primary label="Vincular Novo" spinner="openSearchStudent"
                            wire:click="$set('openSearchStudent', true)" />
                    </div>
                    @if (count($this->arrBoundStudent) > 0)
                        <div class="flow-root">
                            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($this->arrBoundStudent as $student)
                                    <li class="py-3 sm:py-3">
                                        <div class="flex items-center space-x-4">
                                            <div class="flex-shrink-0">
                                                <div class="flex-shrink-0">
                                                    @if ($student->photo)
                                                        <img class="w-10 h-10 rounded-full"
                                                            src="{{ asset($student->photo) }}" alt="avatar">
                                                    @else
                                                        <div
                                                            class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                                            <svg class="absolute w-12 h-12 text-gray-400 -left-1"
                                                                fill="currentColor" viewBox="0 0 20 20"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd"
                                                                    d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                                    clip-rule="evenodd">
                                                                </path>
                                                            </svg>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                                    {{ $student->name }}
                                                </p>
                                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                    {{ $student->email }}
                                                </p>
                                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                                    {{ $student->document_type }}:
                                                    {{ format_document($student->identification_document, $student->getRawOriginal('document_type')) }}
                                                </p>
                                                <p class="truncate ">
                                                    @if ($student->pivot->type == 1)
                                                        <x-badge primary label="Master" />
                                                    @else
                                                        <x-badge secondary label="Normal" />
                                                    @endif
                                                </p>
                                            </div>
                                            <div>
                                                <x-button negative icon="trash"
                                                    wire:click="delete({{ $student->id }})" />
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @else
                        <div class="flex p-2 text-sm  justify-start text-red-800  rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
                            role="alert">
                            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium">Nenhum aluno vinculado</span>
                            </div>
                        </div>
                    @endif
                </div>
            @endif
        </div>
        <x-slot name="footer">
            <div class="text-end">
                <x-button secondary label="Fechar" x-on:click="close" />
            </div>
        </x-slot>
    </x-modal.card>
    <script>
        function closeModalBindGuardianStudent() {
            Livewire.emit('closeModalBindGuardianStudent')
        }
    </script>
</div>
