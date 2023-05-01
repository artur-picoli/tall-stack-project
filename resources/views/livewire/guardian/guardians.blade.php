<div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <div class="mb-2">
        <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Gerenciamento de Responsáveis
        </h5>
    </div>

    @if (!$createClick)
        <div class="mb-3">
            <x-button wire:click="create" spinner="save" primary label="Novo Responsável" />
        </div>
    @else
        @include('livewire.guardian.guardian-create')
    @endif
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
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guardians as $guardian)
                    <tr>
                        <th scope="row"
                            class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            @if ($guardian->photo)
                                <img class="w-12 h-12 rounded-full" src="{{ asset($guardian->photo) }}"
                                    alt="Extra large avatar">
                            @else
                                <div
                                    class="relative w-12 h-12 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                                    <svg class="absolute w-14 h-14 text-gray-400 -left-1" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd">
                                        </path>
                                    </svg>
                                </div>
                            @endif
                            <div class="pl-3">
                                <div class="text-base font-semibold">{{ $guardian->name }}</div>
                            </div>
                        </th>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $guardian->identification_document }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <div class="mt-2">
        {{ $guardians->links() }}
    </div>
</div>
