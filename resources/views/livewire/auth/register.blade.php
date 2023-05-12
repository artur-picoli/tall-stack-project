@section('title', 'Create a new account')
<div
    class="mx-auto  md:mt-16 w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
    <x-enter-or-register-head h2="Crie uma nova conta" linkName="entrar com sua conta" route="login" />
    <form wire:submit.prevent="register">
        <div>
            <x-input icon="user" wire:model.lazy="name" label="Nome" placeholder="João da Silva" />
        </div>
        <div class="mt-6">
            <x-input icon="at-symbol" wire:model.lazy="email" label="E-mail" placeholder="example@example.com.br"/>
        </div>
        <div class="mt-6">
            <x-inputs.password icon="lock-closed"  wire:model.lazy="password" label="Senha" />
        </div>
        <div class="mt-6">
            <x-inputs.password icon="lock-closed"  wire:model.lazy="passwordConfirmation" label="Confirme sua Senha"/>
        </div>
        <div class="mt-6">
            <x-long-button wireTarget="register" buttonText="Cadastrar" />
        </div>
    </form>
</div>
