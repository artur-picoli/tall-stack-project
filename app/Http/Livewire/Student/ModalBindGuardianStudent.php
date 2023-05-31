<?php

namespace App\Http\Livewire\Student;

use App\Models\Guardian;
use App\Models\Student;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class ModalBindGuardianStudent extends Component
{
    use Actions, WithPagination;

    public $modalBindGuardianStudent;

    public $searchGuardian;

    public $openSearchGuardian;

    public Student $student;

    protected $listeners = [
        'openModalBindGuardianStudent',
        'closeModalBindGuardianStudent'
    ];

    public function mount()
    {
        $this->student = new Student;
        $this->openSearchGuardian = false;
    }

    public function openModalBindGuardianStudent(Student $student)
    {
        $this->student = $student;
        $this->modalBindGuardianStudent = true;
    }

    public function closeModalBindGuardianStudent()
    {
        $this->resetExcept('student');
    }

    public function updatedOpenSearchGuardian($value)
    {
        if ($value) {
            $this->reset('searchGuardian');
        }
    }

    private function _validateMaxGuardianStudent()
    {
        if ($this->student->guardians()->count() >= 5) {
            $this->dialog([
                'title'       => 'Atenção!',
                'description' => 'Cada aluno pode ter no máximo 5 responsáveis vinculados.',
                'icon'        => 'error'
            ]);
            $this->reset('openSearchGuardian');

            return false;
        }
        return true;
    }

    public function confirmBindGuardian(Guardian $guardian, $type)
    {
        if (!$this->_validateMaxGuardianStudent()) {
            return;
        };

        $typeDescription = $type == 1 ? 'MASTER' : 'NORMAL';

        $this->dialog()->confirm([
            'title'       => 'Você tem certeza?',
            'description' => 'Deseja mesmo vincular o(a) responsável <b> ' . $guardian->name . '</b> como responsável <b>' . $typeDescription . ' </b> do aluno(a) <b> ' . $this->student->name . '</b> ?',
            'icon'        => 'question',
            'acceptLabel' => 'Sim',
            'rejectLabel' => 'Não',
            'method'      => 'save',
            'params'      => [$guardian->id, $type]
        ]);
    }

    public function save($guardianId, $type)
    {
        $this->student->guardians()->attach($guardianId, ['type' => $type]);

        $this->student->refresh();

        $this->notification([
            'title'       => 'Vinculo salvo!',
            'description' => 'Responsável vinculado com sucesso! ;)',
            'icon'        => 'success'
        ]);

        $this->reset('openSearchGuardian', 'searchGuardian');
    }

    public function delete(Guardian $guardian)
    {
        $this->dialog()->confirm([
            'title'       => 'Você tem certeza?',
            'description' => 'Deseja remover o vínculo com <b>' . $guardian->name . '</b>?',
            'icon'        => 'question',
            'acceptLabel' => 'Sim',
            'rejectLabel' => 'Não',
            'method'      => 'destroy',
            'params'      => $guardian
        ]);
    }

    public function destroy(Guardian $guardian)
    {
        $this->student->guardians()->detach($guardian->id);

        $this->student->refresh();

        $this->notification([
            'title'       => 'Vínculo removido!',
            'description' => 'Vínculo removido com sucesso! ;)',
            'icon'        => 'success'
        ]);
    }

    public function getArrSearchGuardianProperty()
    {
        return Guardian::when($this->searchGuardian, function (Builder $query) {
            return $query->where('name', 'like', "%{$this->searchGuardian}%")
                ->whereDoesntHave('students', function (Builder $query) {
                    $query->where('id', $this->student->id);
                })->latest()->simplePaginate(5);
        }, function () {
            return [];
        });
    }

    public function getArrBoundGuardianProperty()
    {
        return $this->student->guardians->sortBy('created_at');
    }

    public function paginationView()
    {
        return 'livewire::pagination-links';
    }

    public function render()
    {
        return view('livewire.student.modal-bind-guardian-student');
    }
}
