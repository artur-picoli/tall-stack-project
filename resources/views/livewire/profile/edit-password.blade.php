<x-default-card hasCardTitle="true" cardTitle="Edição de Senha" cardDescription="Atualize sua senha">


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
</x-default-card>
