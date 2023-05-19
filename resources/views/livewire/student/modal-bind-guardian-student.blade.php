<div>
    <x-modal.card title="Responsáveis do Aluno" blur wire:model="modalBindGuardianStudent" x-on:close="closeModal">
        <div class="grid grid-cols-1">
            {{-- <form wire:submit.prevent="save" class="space-y-6"> --}}
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
                <div class="border-b border-gray-200 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                        data-tabs-toggle="#myTabContent" role="tablist">
                        <li class="mr-2" role="presentation">
                            <button class="inline-flex p-4 border-b-2 rounded-t-lg text-    -600 hover:text-blue-600 dark:text-blue-500 dark:hover:text-blue-500 border-blue-600 dark:border-blue-500" id="profile-tab"
                                data-tabs-target="#profile" type="button" role="tab" aria-controls="profile"
                                aria-selected="false">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                  </svg>
                                Responsáveis
                            </button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button
                                class="inline-flex p-4 border-b-2 rounded-t-lg dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300"
                                id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab"
                                aria-controls="dashboard" aria-selected="false">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                                  </svg>
                                Vincular Responsável
                            </button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button
                                class="inline-flex p-4 border-b-2 rounded-t-lg dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300"
                                id="dashboard-tab" data-tabs-target="#new" type="button" role="tab"
                                aria-controls="dashboard" aria-selected="false">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                                  </svg>
                                Cadastrar Responsável
                            </button>
                        </li>
                    </ul>
                </div>
                <div id="myTabContent">
                    <div class=" p-4 rounded-lg " id="profile" role="tabpanel"
                        aria-labelledby="profile-tab">
                        <div
                            class="flow-root border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 px-3">
                            <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-shrink-0">
                                            <div
                                                class="relative w-12 h-12 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                                <svg class="absolute w-14 h-14 text-gray-400 -left-1"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
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
                                        <div
                                            class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                            $320
                                        </div>
                                    </div>
                                </li>
                                <li class="py-3 sm:py-4">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex-shrink-0">
                                            <div
                                                class="relative w-12 h-12 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                                <svg class="absolute w-14 h-14 text-gray-400 -left-1"
                                                    fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
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
                                        <div
                                            class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                            $320
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel"
                        aria-labelledby="dashboard-tab">
                        <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                                class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated
                                content</strong>. Clicking another tab will toggle the visibility of this one for the
                            next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                    </div>
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="new" role="tabpanel"
                        aria-labelledby="dashboard-tab">
                        <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                                class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated
                                content</strong>. Clicking another tab will toggle the visibility of this one for the
                            next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                    </div>
                </div>
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
