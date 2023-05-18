<?php

namespace App\Http\Livewire\Student\Traits;

use App\Models\Student;
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

    public  $studentId;

    public $arrDocumentType;

    public $documentType;

    public $resetInputFile;

    public function rules()
    {
        $cpf = $this->documentType == 1 ? 'cpf' : '';

        return [
            'identification_document' => ['required', Rule::unique(Student::class, 'identification_document')->ignore($this->studentId), $cpf],
            'name' => ['required'],
            'photo' => ['nullable', 'mimes:jpg,png', 'max:10000'],
            'editPhoto' => ['nullable', 'mimes:jpg,png', 'max:10000'],
            'documentType' => ['required'],
            'phone' => ['min:11'],
            'email' => ['email', Rule::unique(Student::class, 'email')->ignore($this->studentId)]
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
            'photo' => 'Foto do aluno',
            'editPhoto' => 'Foto do aluno'
        ];
    }
}
