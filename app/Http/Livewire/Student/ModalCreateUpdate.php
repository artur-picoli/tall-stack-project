<?php

namespace App\Http\Livewire\Student;

use App\Events\GuardianStudentCreate;
use App\Http\Livewire\Student\Traits\ModalCreateUpdatePropertiesRulesValidationTrait;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class ModalCreateUpdate extends Component
{
    use WithFileUploads, Actions, ModalCreateUpdatePropertiesRulesValidationTrait;

    protected $listeners = [
        'openStudentModalCreateUpdate',
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

    public function openStudentModalCreateUpdate()
    {
        $this->document_type = 1;
        $this->studentModalCreateUpdate = true;
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
        $this->validateOnly('document_type');
        $this->resetErrorBag('identification_document');
    }

    public function newPhoto()
    {
        $this->reset('photo', 'editPhoto');
    }

    public function updatedPhoto()
    {
        $this->validateOnly('photo');
    }

    public function updatedEditPhoto()
    {
        $this->validateOnly('editPhoto');
    }

    public function save()
    {
        if ($this->studentId) {
            return $this->update($this->studentId);
        }

        $validated = $this->validate();

        $validated['photo'] = optional($validated['photo'])->store('photos');

        Student::create($validated);

        $this->notification([
            'title'       => 'Aluno salvo!',
            'description' => 'Novo aluno criado com sucesso! ;)',
            'icon'        => 'success'
        ]);

        GuardianStudentCreate::dispatch();

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
            'document_type' => $student->getRawOriginal('document_type'),
            'studentModalCreateUpdate' => true
        ]);
    }

    public function update($id)
    {
        $validated = $this->validate();

        $student = Student::find($id);

        if ($validated['editPhoto']) {
            if ($student->photo && Storage::exists($student->photo)) {
                Storage::delete($student->photo);
            }
            $validated['photo'] = $validated['editPhoto']->store('photos');
        }

        $student->fill(array_filter($validated));

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
        $this->emitTo('student.students','refresh');
    }

    public function render()
    {
        return view('livewire.student.modal-create-update');
    }
}
