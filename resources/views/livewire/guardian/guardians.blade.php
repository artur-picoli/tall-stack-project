<div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <div class="mb-2">
        <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Gerenciamento de Responsáveis
        </h5>
    </div>
    <div class="flex flex-col justify-between py-4 bg-white dark:bg-gray-800 md:flex-row md:items-center">
        <div class="mb-4 md:mb-0 md:order-1">
            <x-button icon="plus" primary label="Novo Responsável" wire:click="$emit('openModal')" />
        </div>
        <div class="md:order-2">
            <x-input icon="search" wire:model="search" placeholder="Nome do responsável" />
        </div>
    </div>
    @livewire('guardian.modal-create-update')
    @if (count($this->guardians) > 0)
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg border border-gray-200 dark:border-gray-700 ">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Responsável
                        </th>
                        <th scope="col" class="px-6  py-3">
                            Nº Documento
                        </th>
                        <th scope="col" class="px-6  py-3">
                            Telefone
                        </th>
                        <th scope="col" class="px-6  py-3">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($this->guardians as $guardian)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                @if ($guardian->photo)
                                    <img class="w-10 h-10 rounded-full" src="{{ asset($guardian->photo) }}"
                                        alt="Extra large avatar">
                                @else
                                    <div
                                        class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                        <svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                clip-rule="evenodd">
                                            </path>
                                        </svg>
                                    </div>
                                @endif
                                <div class="pl-3">
                                    <div class="text-base font-semibold">{{ $guardian->name }}</div>
                                    <div class="font-normal text-gray-500">{{ $guardian->email }}</div>
                                </div>
                            </th>
                            <td class="px-6 py-4">
                                {{ $guardian->getDocumentTypeLabelAttribute() }}:
                                {{ format_document($guardian->identification_document, $guardian->document_type) }}
                            </td>
                            <td class="px-6 py-4">
                                {{ format_phone($guardian->phone) }}
                            </td>
                            <td class="px-6 gap-3 py-4 text-right">
                                <x-dropdown>
                                    <x-dropdown.item icon="pencil-alt" label="Editar"
                                        wire:click="$emit('edit', {{ $guardian->id }})" />
                                    <x-dropdown.item icon="trash" label="Excluir"
                                        wire:click="delete({{ $guardian->id }})" />
                                </x-dropdown>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="flex p-4 mb-4 text-sm  justify-center text-red-800  rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
            role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Nenhum responsável localizado.</span>
            </div>
        </div>
    @endif

    <div class="mt-2">
        {{ $this->guardians->links() }}
    </div>
</div>
