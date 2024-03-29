<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class Students extends Component
{
    use Actions, WithPagination;

    public $search;

    protected $listeners = ['refresh' => '$refresh'];

    public function delete(Student $student)
    {
        $this->dialog()->confirm([
            'title'       => 'Você tem certeza?',
            'description' => 'Deseja mesmo excluir o aluno(a) ' . $student->name . '?
            Todos os vínculos com responsáveis também serão removidos!',
            'icon'        => 'question',
            'acceptLabel' => 'Sim',
            'rejectLabel' => 'Não',
            'method'      => 'destroy',
            'params'      => $student
        ]);
    }

    public function destroy(Student $student)
    {
        if ($student->photo && Storage::exists($student->photo)) {
            Storage::delete($student->photo);
        }

        $student->delete();

        $this->notification([
            'title'       => 'Aluno removido!',
            'description' => 'Aluno removido com sucesso! ;)',
            'icon'        => 'success'
        ]);

        $this->reset();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function getStudentsProperty()
    {
        return Student::where('name', 'like', "%{$this->search}%")->latest()->paginate(10);
    }

    public function render()
    {
        return view('livewire.student.students');
    }
}
