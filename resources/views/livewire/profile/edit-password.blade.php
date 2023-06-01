<x-default-card hasCardTitle="true" cardTitle="Edição de Senha" cardDescription="Atualize sua senha">
    <form wire:submit.prevent="save" class="space-y-6">
        <x-inputs.password wire:model.lazy="currentPassword" label="Senha atual" placeholder="" />

        <x-inputs.password wire:model.lazy="password" label="Nova senha" placeholder="" />

        <x-inputs.password wire:model.lazy="passwordConfirmation" label="Confirmar nova senha" placeholder="" />

        <x-button wire:click="save" spinner="save" primary label="Salvar" />
    </form>
</x-default-card>
