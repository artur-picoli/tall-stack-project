@section('title', 'Dashboard')
<div>
    <div class="md:flex gap-3">
        <div
            class="w-full md:w-1/2 mb-3 md:mb-0 p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Alunos</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">Alunos cadastrados:
                <x-badge primary label="{{ $this->countStudents['count'] }}" />
            </p>
            <span
                class="mt-2 bg-blue-100 text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">
                <svg aria-hidden="true" class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                        clip-rule="evenodd"></path>
                </svg>
                Último cadastro {{ \Carbon\Carbon::parse($this->countStudents['lastCreatedAt'])->diffForHumans() }}
            </span>
        </div>
        <div
            class=" w-full md:w-1/2 p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Responsáveis</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">Responsáveis cadastrados:
                <x-badge primary label="{{ $this->countGuardians['count'] }}" />
            </p>
            <span
                class="mt-2 bg-blue-100 text-blue-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400">
                <svg aria-hidden="true" class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                        clip-rule="evenodd"></path>
                </svg>
                Último cadastro {{ \Carbon\Carbon::parse($this->countGuardians['lastCreatedAt'])->diffForHumans() }}
            </span>
        </div>
    </div>
    @push('js')
        <script src="{{ Vite::asset('resources/js/pusher.js') }}" type="module"></script>
    @endpush
</div>
