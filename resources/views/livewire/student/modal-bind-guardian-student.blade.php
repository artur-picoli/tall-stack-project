<div>
    <x-modal.card title="Responsáveis do Aluno" blur wire:model="modalBindGuardianStudent" x-on:close="closeModal">
        <div class="grid grid-cols-1 gap-4">
            <form wire:submit.prevent="save" class="space-y-6">
                <div class="w-full max-w-sm bg-transparent border border-transparent rounded-lg shado mx-auto">
                    <div class="flex flex-col items-center pb-10">
                        @if ($student->photo)
                            <img class="w-24 h-24 mb-3 rounded-full shadow-lg mt-3" src="{{ asset($student->photo) }}"
                                alt="avatar" />
                        @else
                            <div
                                class="relative w-24 h-24 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600 mt-3">
                                <svg class="absolute  text-gray-400 -left-1" style="width:100px; height:120px"
                                    fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                        clip-rule="evenodd">
                                    </path>
                                </svg>
                            </div>
                        @endif
                        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $student->name }}</h5>
                        <span class="text-sm text-gray-500 dark:text-gray-400">{{ $student->typeLabel }}:
                            {{ $student->identification_document }}</span>
                    </div>
                </div>
                <div class="flex items-center justify-between mb-4">
                    <h6 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Responsáveis pelo aluno
                    </h6>
                    Busca aqui
                </div>
        </div>
        <div class="flow-root">
            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                <li class="py-3 sm:py-4">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <div class="relative w-12 h-12 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                <svg class="absolute w-14 h-14 text-gray-400 -left-1" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                        clip-rule="evenodd">
                                    </path>
                                </svg>
                            </div>
                            {{-- <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Neil image"> --}}
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                Neil Sims
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                email@windster.com
                            </p>
                        </div>
                        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                            $320
                        </div>
                    </div>
                </li>
                <li class="py-3 sm:py-4">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <div class="relative w-12 h-12 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                <svg class="absolute w-14 h-14 text-gray-400 -left-1" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                        clip-rule="evenodd">
                                    </path>
                                </svg>
                            </div>
                            {{-- <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-1.jpg" alt="Neil image"> --}}
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                Neil Sims
                            </p>
                            <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                email@windster.com
                            </p>
                        </div>
                        <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                            $320
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <x-slot name="footer">
            <div class="text-end">
                <x-button secondary label="Fechar" x-on:click="close" />
                {{-- <x-button primary spinner="save" label="Salvar" wire:click="save" /> --}}
            </div>
        </x-slot>
    </x-modal.card>
    <script>
        function closeModal() {
            Livewire.emit('closeModal')
        }
    </script>
</div>
