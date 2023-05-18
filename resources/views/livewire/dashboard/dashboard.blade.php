<div>
    <div>
        <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Alunos cadastrados:
            {{ $this->countStudents }}</h2>
    </div>
    @push('js')
        <script src="{{ Vite::asset('resources/js/pusher.js') }}" type="module"></script>
    @endpush
</div>
