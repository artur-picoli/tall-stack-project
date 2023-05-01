<x-default-card hasCardTitle="true" cardTitle="Edição de Senha" cardDescription="Atualize sua senha">


    <form wire:submit.prevent="save" class="space-y-6">
        <div class="w-full ">
            <x-inputs.password  wire:model.lazy="password" label="Senha" placeholder="" />
        </div>
        <div class="w-full ">
            <x-inputs.password  wire:model.lazy="passwordConfirmation" label="Confirme a senha" placeholder="" />
        </div>
        <div>
            <x-button wire:click="save" spinner="save" primary label="Salvar" />
        </div>
    </form>
</x-default-card>
