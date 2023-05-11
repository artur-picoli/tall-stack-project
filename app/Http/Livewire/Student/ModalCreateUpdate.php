<?php

namespace App\Http\Livewire\Student;


use App\Http\Livewire\Student\Traits\ModalCreateUpdatePropertiesRulesValidationTrait;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class ModalCreateUpdate extends Component
{
    use WithFileUploads, Actions, ModalCreateUpdatePropertiesRulesValidationTrait;

    protected $listeners = [
        'openModal',
        'closeModal',
        'newPhoto',
        'edit'
    ];

    public function mount()
    {
        $this->arrDocumentType  = [
            ['name' => 'CPF', 'id' => 1],
            ['name' => 'RG', 'id' => 2],
            ['name' => 'Outro', 'id' => 3],
        ];
    }

    public function openModal()
    {
        $this->modalCreateUpdate = true;
    }

    public function closeModal()
    {
        $this->resetExcept('arrDocumentType', 'resetInputFile');
        $this->resetErrorBag();
        $this->resetInputFile++;
    }

    public function updatedDocumentType()
    {
        $this->reset('identification_document');
        $this->validateOnly('documentType');
        $this->resetErrorBag('identification_document');
    }

    public function newPhoto()
    {
        $this->reset('photo', 'editPhoto');
    }

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'nullable|mimes:jpg,png|max:10000',
        ]);
    }

    public function updatedEditPhoto()
    {
        $this->validate([
            'editPhoto' => 'nullable|mimes:jpg,png|max:10000',
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

        $this->resetModalAfterSaveOrUpdateAndRefreshList();
    }

    public function edit(Student $student)
    {
        $this->fill([
            'studentId' => $student->id,
            'name' => $student->name,
            'email' => $student->email,
            'phone' => $student->phone,
            'currentPhoto' => $student->photo,
            'identification_document' => $student->identification_document,
            'documentType' => $student->document_type,
            'modalCreateUpdate' => true
        ]);
    }

    public function update($id)
    {
        $this->validate();

        $student = Student::find($id);

        $student->name = $this->name;

        if ($this->editPhoto) {
            $student->photo = optional($this->editPhoto)->store('photos');
        }

        $student->email = $this->email;
        $student->phone = $this->phone;
        $student->email = $this->email;
        $student->document_type = $this->documentType;
        $student->identification_document = $this->identification_document;


        if ($student->isDirty()) {
            $student->save();
        }

        $this->notification([
            'title'       => 'Aluno salvo!',
            'description' => 'Aluno editado com sucesso! ;)',
            'icon'        => 'success'
        ]);

        $this->resetModalAfterSaveOrUpdateAndRefreshList();
    }

    public function resetModalAfterSaveOrUpdateAndRefreshList()
    {
        $this->resetExcept('arrDocumentType');
        $this->resetErrorBag();
        $this->resetInputFile++;
        $this->emit('refresh');
    }

    public function render()
    {
        return view('livewire.student.modal-create-update');
    }
}
