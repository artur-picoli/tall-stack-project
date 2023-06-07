<?php

namespace App\Http\Livewire\Guardian;

use App\Models\Guardian;
use App\Models\GuardianStudent;
use App\Models\Student;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class ModalBindGuardianStudent extends Component
{
    use Actions, WithPagination;

    public $modalBindGuardianStudent;

    public $searchStudent;

    public $openSearchStudent;

    public Guardian $guardian;

    protected $listeners = [
        'openModalBindGuardianStudent',
        'closeModalBindGuardianStudent'
    ];

    public function mount()
    {
        $this->guardian = new Guardian;
        $this->openSearchStudent = false;
    }

    public function openModalBindGuardianStudent(Guardian $guardian)
    {
        $this->guardian = $guardian;
        $this->modalBindGuardianStudent = true;
    }

    public function closeModalBindGuardianStudent()
    {
        $this->resetExcept('guardian');
    }

    public function updatedOpenSearchStudent($value)
    {
        if ($value) {
            $this->reset('searchStudent');
        }
    }

    public function confirmBindStudent(Student $student, $type)
    {
        try {
            GuardianStudent::validateMaxGuardianStudent($student, $this->guardian);

            $typeDescription = $type == 1 ? 'MASTER' : 'NORMAL';

            $this->dialog()->confirm([
                'title'       => 'Você tem certeza?',
                'description' => 'Deseja mesmo vincular o aluno(a) <b> ' . $student->name . '</b> como dependente <b>' . $typeDescription . ' </b> do(a) responsável <b> ' . $this->guardian->name . '</b> ?',
                'icon'        => 'question',
                'acceptLabel' => 'Sim',
                'rejectLabel' => 'Não',
                'method'      => 'save',
                'params'      => [$student->id, $type]
            ]);
        } catch (Exception $e) {
            $this->dialog([
                'title'       => 'Atenção!',
                'description' => $e->getMessage(),
                'icon'        => 'error'
            ]);

            $this->reset('openSearchStudent');
        }
    }

    public function save($studentId, $type)
    {
        $this->guardian->students()->attach($studentId, ['type' => $type]);

        $this->guardian->refresh();

        $this->notification([
            'title'       => 'Vinculo salvo!',
            'description' => 'Aluno vinculado com sucesso! ;)',
            'icon'        => 'success'
        ]);

        $this->reset('openSearchStudent', 'searchStudent');
    }

    public function delete(Student $student)
    {
        $this->dialog()->confirm([
            'title'       => 'Você tem certeza?',
            'description' => 'Deseja remover o vínculo com <b>' . $student->name . '</b>?',
            'icon'        => 'question',
            'acceptLabel' => 'Sim',
            'rejectLabel' => 'Não',
            'method'      => 'destroy',
            'params'      => $student
        ]);
    }

    public function destroy(Student $student)
    {
        $this->guardian->students()->detach($student->id);

        $this->guardian->refresh();

        $this->notification([
            'title'       => 'Vínculo removido!',
            'description' => 'Vínculo removido com sucesso! ;)',
            'icon'        => 'success'
        ]);
    }

    public function updatedSearchStudent()
    {
        $this->resetPage();
    }

    public function getArrSearchStudentProperty()
    {
        return Student::getStudentsBySearchIgnoringGuardianId($this->searchStudent, $this->guardian->id);
    }

    public function getArrBoundStudentProperty()
    {
        return $this->guardian->students->sortBy('created_at');
    }


    public function render()
    {
        return view('livewire.guardian.modal-bind-guardian-student');
    }
}
