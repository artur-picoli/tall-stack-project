<?php

namespace App\Http\Livewire\Student;

use App\Models\Guardian;
use App\Models\Student;
use Livewire\Component;
use WireUi\Traits\Actions;

class ModalBindGuardianStudent extends Component
{
    use Actions;

    public $modalBindGuardianStudent;

    public $searchGuardian;

    public Student $student;

    public $arrGuardians;

    protected $listeners = [
        'openModalBindGuardianStudent',
        'closeModal'
    ];

    public function mount()
    {
        $this->student = new Student;
        $this->arrGuardians = Guardian::all();
    }

    public function openModalBindGuardianStudent(Student $student)
    {
        $this->student = $student;
        $this->student->typeLabel = $student->getLabelDocumentType($student->document_type);
        $this->modalBindGuardianStudent = true;
    }

    public function closeModal()
    {
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.student.modal-bind-guardian-student');
    }
}
