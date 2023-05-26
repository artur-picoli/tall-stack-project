@section('title', 'Faça login em sua conta')

<div
    class="mx-auto mt-16 w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700 relative">
    <div class="absolute right-0 top-0">
        <x-theme-toggle />
    </div>
    <x-enter-or-register-head h2="Entre em sua conta" linkName="crie uma nova conta" route="register" />
        <form wire:submit.prevent="authenticate" class="space-y-6">

            <x-input icon="user" wire:model.lazy="email" label="E-mail" placeholder="example@example.com.br" />

            <x-inputs.password icon="lock-closed" wire:model.lazy="password" label="Senha" placeholder="" />

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input wire:model.lazy="remember" id="remember" name="remember" type="checkbox" value=""
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="remember"
                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Lembrar-me</label>
                </div>
                <div class="text-sm leading-5">
                    <a href="{{ route('password.request') }}"
                        class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                        Esqueceu sua senha?
                    </a>
                </div>
            </div>

            <x-long-button wireTarget="authenticate" buttonText="Entrar" />
        </form>
</div>
