@section('title', 'Criar uma nova conta')
<div
    class="mx-auto  md:mt-16 w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
    <x-enter-or-register-head h2="Crie uma nova conta" linkName="entrar com sua conta" route="login" />
    <form wire:submit.prevent="register" class="space-y-6">
        <x-input icon="user" wire:model.lazy="name" label="Nome" placeholder="João da Silva" />

        <x-input icon="at-symbol" wire:model.lazy="email" label="E-mail" placeholder="example@example.com.br" />

        <x-inputs.password icon="lock-closed" wire:model.lazy="password" label="Senha" />

        <x-inputs.password icon="lock-closed" wire:model.lazy="passwordConfirmation" label="Confirme sua Senha" />

        <x-button class="w-full" primary label="Cadastrar" wire:click="register" spinner="register" />
    </form>
</div>
