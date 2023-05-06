<div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <div class="mb-2">
        <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Gerenciamento de Alunos
        </h5>
    </div>

    <div class="mb-3">
        <x-button spinner="save" primary label="Novo Aluno" wire:click="openModal" />
    </div>

    @include('livewire.student.student-create')
    @if (count($this->students) > 0)
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg border border-gray-200 dark:border-gray-700 ">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Aluno
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nº Documento
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Editar</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($this->students as $student)
                        <tr>
                            <th scope="row"
                                class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                @if ($student->photo)
                                    <img class="w-12 h-12 rounded-full" src="{{ asset($student->photo) }}"
                                        alt="Extra large avatar">
                                @else
                                    <div
                                        class="relative w-12 h-12 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                        <svg class="absolute w-14 h-14 text-gray-400 -left-1" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                clip-rule="evenodd">
                                            </path>
                                        </svg>
                                    </div>
                                @endif
                                <div class="pl-3">
                                    <div class="text-base font-semibold">{{ $student->name }}</div>
                                </div>
                            </th>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ format_document($student->identification_document, $student->document_type) }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <x-dropdown>
                                        <x-dropdown.item icon="pencil-alt" label="Editar" wire:click="edit({{ $student->id }})"/>
                                        <x-dropdown.item icon="trash" label="Excluir" />
                                </x-dropdown>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    @endif
    <div class="mt-2">
        {{ $this->students->links() }}
    </div>
</div>
