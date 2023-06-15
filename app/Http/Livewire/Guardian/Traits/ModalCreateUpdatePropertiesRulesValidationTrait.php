<?php

namespace App\Http\Livewire\Guardian\Traits;

use App\Models\Guardian;
use Illuminate\Support\Arr;
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

    public $guardianId;

    public $arrDocumentType;

    public $document_type = 1;

    public $resetInputFile;

    public function rules()
    {
        return [
            'identification_document' => [
                'required',
                Rule::unique(Guardian::class, 'identification_document')->ignore($this->guardianId),
                $this->document_type == 1 ? 'cpf' : ''
            ],
            'name' => ['required'],
            'photo' => ['nullable', 'mimes:jpg,png', 'max:10000'],
            'editPhoto' => ['nullable', 'mimes:jpg,png', 'max:10000'],
            'document_type' => ['required'],
            'phone' => ['min:11'],
            'email' => ['email', Rule::unique(Guardian::class, 'email')->ignore($this->guardianId)]
        ];
    }

    public function validationAttributes()
    {
        $attributeName = 'Outro';
        if ($this->document_type == 1) {
            $attributeName = 'CPF';
        } elseif ($this->document_type == 2) {
            $attributeName = 'RG';
        }

        return [
            'identification_document' => $attributeName,
            'document_type' => 'Tipo de Documento',
            'phone' => 'Celular',
            'photo' => 'Foto do responsável',
            'editPhoto' => 'Foto do responsável'
        ];
    }
}
