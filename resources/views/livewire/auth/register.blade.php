@section('title', 'Create a new account')
<div
    class="mx-auto  md:mt-16 w-full max-w-md p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
    <x-enter-or-register-head h2="Crie uma nova conta" linkName="entrar com sua conta" route="login" />
    <form wire:submit.prevent="register">
        <div>
            <x-default-input name="name" placeHolder="João da Silva" type="text" label="Nome" />
        </div>
        <div class="mt-6">
            <x-default-input name="email" placeHolder="example@example.com.br" type="text"
                label="Endereço de e-mail" />
        </div>
        <div class="mt-6">
            <x-default-input name="password" placeHolder="•••••••••" type="password" label="Senha" />
        </div>
        <div class="mt-6">
            <x-default-input wireModel="passwordConfirmation" name="password_confirmation" placeHolder="•••••••••"
                type="password" label="Confirme a senha" />
        </div>
        <div class="mt-6">
            <x-long-button wireTarget="register" buttonText="Cadastrar" />
        </div>
    </form>
</div>
