<div>
    <x-modal.card title="Cadastro de Aluno" blur wire:model="modalCreateUpdate" x-on:close="closeModal">
        <div class="grid grid-cols-1 gap-4">
            <form wire:submit.prevent="save" class="space-y-6">
                @if ($this->studentId)
                    @include('livewire.student.photo-edit-form')
                @else
                    @include('livewire.student.photo-create-form')
                @endif
                <div class="w-full ">
                    <div>
                        <x-input icon="user" wire:model.lazy="name" label="Nome" />
                    </div>
                </div>
                <div class="flex w-full gap-3 ">
                    <div class="w-1/2">
                        <x-select label="Tipo de Documento" :options="$arrDocumentType" option-label="name" option-value="id"
                            wire:model="documentType" />
                    </div>
                    <div class="w-1/2">
                        @if ($documentType == 1)
                            <x-input-cpf icon="identification" wire:model.lazy="identification_document" label="CPF"
                                id="cpf" />
                        @elseif($documentType == 2)
                            <x-inputs.maskable icon="identification" mask="XXXXXXXXXXXXXXX"
                                wire:model.lazy="identification_document" label="RG" id="rg" />
                        @elseif($documentType == 3)
                            <x-inputs.maskable icon="identification" mask="XXXXXXXXXXXXXXX"
                                wire:model.lazy="identification_document" label="Documento" id="outro" />
                        @endif
                    </div>
                </div>
                <div class="w-full">
                    <div>
                        <x-inputs.maskable icon="phone" mask="(##)#####-####" wire:model.lazy="phone"
                            label="Celular" />
                    </div>
                </div>
                <div class="w-full">
                    <div>
                        <x-input icon="at-symbol" wire:model.lazy="email" label="E-mail" />
                    </div>
                </div>
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
