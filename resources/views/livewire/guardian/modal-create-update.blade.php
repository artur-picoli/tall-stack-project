<div>
    <x-modal.card title="Cadastro de Responsável" blur wire:model="modalCreateUpdate" x-on:close="closeModal">
        <div class="grid grid-cols-1 gap-4">
            <form wire:submit.prevent="save" class="space-y-6">
                @if ($this->guardianId)
                    @include('livewire.guardian.photo-edit-form')
                @else
                    @include('livewire.guardian.photo-create-form')
                @endif
                <x-input icon="user" wire:model.lazy="name" label="Nome" />
                <div class="flex w-full gap-3 ">
                    <div class="w-1/2">
                        <x-select label="Tipo de Documento" :options="$arrDocumentType" option-label="name" option-value="id"
                            wire:model="document_type" />
                    </div>
                    <div class="w-1/2">
                        @if ($document_type == 1)
                            <x-inputs.maskable icon="identification" mask="###.###.###-##"
                                wire:model.lazy="identification_document" label="CPF" id="cpf" />
                        @elseif($document_type == 2)
                            <x-inputs.maskable icon="identification" mask="XXXXXXXXXXXXXXX"
                                wire:model.lazy="identification_document" label="RG" id="rg" />
                        @elseif($document_type == 3)
                            <x-inputs.maskable icon="identification" mask="XXXXXXXXXXXXXXX"
                                wire:model.lazy="identification_document" label="Documento" id="outro" />
                        @endif
                    </div>
                </div>
                <x-inputs.maskable icon="phone" mask="(##)#####-####" wire:model.lazy="phone" label="Celular" />

                <x-input icon="at-symbol" wire:model.lazy="email" label="E-mail" />
        </div>
        <x-slot name="footer">
            <div class="text-end">
                <x-button secondary label="Cancelar" x-on:click="close" />
                <x-button primary spinner="save" label="Salvar" wire:click="save" />
            </div>
        </x-slot>
    </x-modal.card>
    <script>
        function closeModal() {
            Livewire.emit('closeModal')
        }
    </script>
</div>
