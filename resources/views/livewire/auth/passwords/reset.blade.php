@section('title', 'Reset password')

<div
    class="mx-auto mt-16 w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
    <x-enter-or-register-head h2="Redefinir senha" linkName="entrar com sua conta" route="login" />
    @if ($passwordReseted)
        <div class="flex p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800"
            role="alert">
            <svg fill="none" class="flex-shrink-0 inline w-5 h-5 mr-3" stroke="currentColor" stroke-width="1.5"
                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">{{ $passwordReseted }}</span>
            </div>
        </div>
        <div class="mt-6">
            <x-long-link-button href="home" textButton="Entrar" />

        </div>
    @else
        <form wire:submit.prevent="resetPassword">
            <input wire:model="token" type="hidden">
            <div>
                <x-input icon="at-symbol" wire:model.lazy="email" label="E-mail" readonly
                    placeholder="example@example.com.br" />
            </div>
            <div class="mt-6">
                <x-inputs.password icon="lock-closed" wire:model.lazy="password" label="Senha" />
            </div>
            <div class="mt-6">
                <x-inputs.password icon="lock-closed" wire:model.lazy="passwordConfirmation"
                    label="Confirme sua Senha" />
            </div>
            <div class="mt-6">
                <div class="mt-6">
                    <x-long-button wireTarget="resetPassword" buttonText="Redefinir" />
                </div>
            </div>
        </form>
    @endif
</div>
