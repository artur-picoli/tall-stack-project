<?php

namespace App\Http\Livewire\Guardian;

use App\Models\Guardian;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\Actions;

class Guardians extends Component
{
    use Actions, WithPagination;

    public $search;

    protected $listeners = ['refresh' => '$refresh'];

    public function delete(Guardian $guardian)
    {
        $this->dialog()->confirm([
            'title'       => 'Você tem certeza?',
            'description' => 'Deseja mesmo excluir o(a) responsável ' . $guardian->name . '?
            Todos os vínculos com alunos também serão removidos!',
            'icon'        => 'question',
            'acceptLabel' => 'Sim',
            'rejectLabel' => 'Não',
            'method'      => 'destroy',
            'params'      => $guardian
        ]);
    }

    public function destroy(Guardian $guardian)
    {
        if ($guardian->photo && Storage::exists($guardian->photo)) {
            Storage::delete($guardian->photo);
        }

        $guardian->delete();

        $this->notification([
            'title'       => 'Responsável removido!',
            'description' => 'Responsável removido com sucesso! ;)',
            'icon'        => 'success'
        ]);

        $this->reset();
    }

    public function paginationView()
    {
        return 'livewire::pagination-links';
    }

    public function getGuardiansProperty()
    {
        return Guardian::where('name', 'like', "%{$this->search}%")->latest()->paginate(10);
    }

    public function render()
    {
        return view('livewire.guardian.guardians');
    }
}
