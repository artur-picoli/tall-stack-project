<div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <section class="max-w-xl">

        <div class="flex gap-3 mb-2">
            <div>
                <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Edição de Senha
                </h5>
            </div>
        </div>
        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
            Atualize sua senha
        </p>
        <form wire:submit.prevent="save" class="space-y-6">
            <div class="w-full ">
                <x-default-input name="password" placeHolder="" type="password" label="Senha" />
            </div>
            <div class="w-full ">
                <x-default-input wireModel="passwordConfirmation" name="password_confirmation" placeHolder=""
                    type="password" label="Confirme a senha" />
            </div>
            <div>
                <x-short-button wireTarget="save" buttonText="Salvar" />
            </div>
        </form>
    </section>
</div>
