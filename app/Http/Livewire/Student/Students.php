<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class Students extends Component
{
    use WithFileUploads, Actions, WithPagination;

    public $photo;

    public $identification_document;

    public $name;

    public $phone;

    public $email;

    public $isEdit;

    public $cardModal = '';

    public $studentId;

    public $arrDocumentType;

    public $documentType = 1;

    public $iteration;

    protected $listeners = ['modalClose' => 'modalClose', 'newPhoto' => 'newPhoto'];

    public function paginationView()
    {
        return 'livewire::pagination-links';
    }

    public function rules()
    {
        $cpf = $this->documentType == 1 ? 'cpf' : '';

        return [
            'identification_document' => ['required', Rule::unique(Student::class, 'identification_document')->ignore($this->studentId), $cpf],
            'name' => ['required'],
            'photo' => ['nullable', 'mimes:jpg,png', 'max:10000'],
            'documentType' => ['required'],
            'phone' => ['min:11'],
            'email' => ['email', Rule::unique(Student::class, 'email')->ignore($this->studentId)]
        ];
    }

    public function validationAttributes(): array
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
            'phone' => 'Celular'
        ];
    }

    public function mount()
    {
        $this->arrDocumentType  = [
            ['name' => 'CPF', 'id' => 1],
            ['name' => 'RG', 'id' => 2],
            ['name' => 'Outro', 'id' => 3],
        ];
    }



    public function updatedDocumentType()
    {
        $this->reset('identification_document');
        $this->validateOnly('documentType');
        $this->resetErrorBag('identification_document');
    }

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'nullable|mimes:jpg,png|max:10000',
        ]);
    }

    public function save()
    {

        if ($this->studentId) {
            return $this->update($this->studentId);
        }
        $this->validate();

        Student::create([
            'document_type' => $this->documentType,
            'identification_document' => $this->identification_document,
            'name' => $this->name,
            'photo' => optional($this->photo)->store('photos'),
            'phone' => $this->phone,
            'email' => $this->email
        ]);


        $this->notification([
            'title'       => 'Aluno salvo!',
            'description' => 'Novo aluno criado com sucesso! ;)',
            'icon'        => 'success'
        ]);

        $this->resetExcept('arrDocumentType');
        $this->resetErrorBag();
        $this->iteration++;
    }

    public function edit(Student $student)
    {
        $this->studentId = $student->id;

        $this->fill([
            'name' => $student->name,
            'email' => $student->email,
            'phone' => $student->phone,
            'photo' => $student->photo,
            'identification_document' => $student->identification_document,
            'documentType' => $student->document_type,
        ]);

        $this->isEdit = true;
        $this->cardModal = true;
    }

    public function update($id)
    {
        $this->validate();

        $student = Student::find($id);

        $student->name = $this->name;
        $student->email = $this->email;
        $student->phone = $this->phone;
        $student->email = $this->email;
        $student->document_type = $this->documentType;
        $student->identification_document = $this->identification_document;

        if($student->isDirty()){
            $student->save();
        }

        $this->notification([
            'title'       => 'Aluno salvo!',
            'description' => 'Novo aluno criado com sucesso! ;)',
            'icon'        => 'success'
        ]);

        $this->resetExcept('arrDocumentType');
        $this->resetErrorBag();
        $this->iteration++;
    }


    public function newPhoto()
    {
        $this->reset('photo');
    }

    public function openModal()
    {
        $this->cardModal = true;
    }

    public function getStudentsProperty()
    {
        return Student::latest()->paginate(10);
    }

    public function render()
    {
        return view('livewire.student.students');
    }
}
