<div class="sm:mx-auto sm:w-full sm:max-w-md mb-5">
    <x-logo class="w-auto h-16 mx-auto text-indigo-600" />

    <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 dark:text-white leading-9">
        {{ $h2 }}
    </h2>
    @if (Route::has($route))
        <p class="mt-2 text-sm text-center text-gray-600 dark:text-gray-300 leading-5 max-w">
            Ou
            <a href="{{ route($route) }}"
                class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                {{ $linkName }}
            </a>
        </p>
    @endif
</div>
