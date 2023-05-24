<?php

namespace App\Http\Livewire\Guardian\Traits;

use App\Models\Guardian;
use Illuminate\Validation\Rule;

trait ModalCreateUpdatePropertiesRulesValidationTrait
{
    public $photo;

    public $identification_document;

    public $name;

    public $phone;

    public $email;

    public $modalCreateUpdate;

    public $editPhoto;

    public $currentPhoto;

    public  $guardianId;

    public $arrDocumentType;

    public $documentType = 1;

    public $resetInputFile;

    public function rules()
    {
        $cpf = $this->documentType == 1 ? 'cpf' : '';

        return [
            'identification_document' => ['required', Rule::unique(Guardian::class, 'identification_document')->ignore($this->guardianId), $cpf],
            'name' => ['required'],
            'photo' => ['required', 'mimes:jpg,png', 'max:10000'],
            'editPhoto' => ['nullable', 'mimes:jpg,png', 'max:10000'],
            'documentType' => ['required'],
            'phone' => ['min:11'],
            'email' => ['email', Rule::unique(Guardian::class, 'email')->ignore($this->guardianId)]
        ];
    }

    public function validationAttributes()
    {
        $attributeName = 'Outro';
        if ($this->documentType == 1) {
            $attributeName = 'CPF';
        } elseif ($this->documentType == 2) {
            $attributeName = 'RG';
        }

        return [
            'identification_document' => $attributeName,
            'documentType' => 'Tipo de Documento',
            'phone' => 'Celular',
            'photo' => 'Foto do responsável',
            'editPhoto' => 'Foto do responsável'
        ];
    }
}
