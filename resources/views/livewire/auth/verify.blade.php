@section('title', 'Verifique seu endereço de e-mail')
<div>
    <div
        class="mx-auto mt-16 w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <div class="sm:mx-auto sm:w-full sm:max-w-md mb-5">
            <x-logo class="w-auto h-16 mx-auto text-indigo-600" />

            <h2 class="mt-6 text-3xl font-extrabold text-center text-gray-900 dark:text-white leading-9">
                Ative sua conta
            </h2>
            @if (Route::has('logout'))
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    <p class="mt-2 text-sm text-center text-gray-600 dark:text-gray-300 leading-5 max-w">
                        Ou
                        @csrf
                        <button type="submit"
                            class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                            fazer logout
                        </button>
                    </p>
                </form>
            @endif
        </div>
        @if ($resent)
            <div id="alert-3"
                class="flex p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
                role="alert">
                <svg fill="none" class="flex-shrink-0 inline w-5 h-5 mr-3" stroke="currentColor" stroke-width="1.5"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium">
                    Link reenviado com sucesso!
                </div>
                <button type="button" wire:click="closeResentMessage"
                    class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-3" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        @endif

        <div class="text-sm text-gray-700 dark:text-white">
            <p>Te enviamos um link de ativação por e-mail. Se você não recebeu, clique no botão abaixo para receber um
                novo!</p>
        </div>
        <div class="mt-6">
            <x-long-link-button wireClick="resend" textButton="Reenviar" />
        </div>
    </div>
</div>
