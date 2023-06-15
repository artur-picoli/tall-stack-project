<?php

namespace App\Http\Livewire\Student\Traits;

use App\Models\Student;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

trait ModalCreateUpdatePropertiesRulesValidationTrait
{
    public $photo;

    public $identification_document;

    public $name;

    public $phone;

    public $email;

    public $studentModalCreateUpdate;

    public $editPhoto;

    public $currentPhoto;

    public $studentId;

    public $arrDocumentType;

    public $document_type;

    public $resetInputFile;

    public function rules()
    {
        return [
            'identification_document' => [
                'required',
                Rule::unique(Student::class, 'identification_document')->ignore($this->studentId),
                $this->document_type == 1 ? 'cpf' : ''
            ],
            'name' => ['required'],
            'photo' => ['nullable', 'mimes:jpg,png', 'max:10000'],
            'editPhoto' => ['nullable', 'mimes:jpg,png', 'max:10000'],
            'document_type' => ['required'],
            'phone' => ['min:11'],
            'email' => ['email', Rule::unique(Student::class, 'email')->ignore($this->studentId)]
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
            'photo' => 'Foto do aluno',
            'editPhoto' => 'Foto do aluno'
        ];
    }
}
