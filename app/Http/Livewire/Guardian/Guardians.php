<?php

namespace App\Http\Livewire\Guardian;

use Livewire\Component;
use App\Models\Guardian;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Guardians extends Component
{
    use WithFileUploads, Actions, WithPagination;

    public $photo;

    public $identification_document;

    public $name;

    public $cardModal;

    public function paginationView()
    {
        return 'livewire::pagination-links';
    }

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'required|mimes:jpg,png|max:10000',
        ]);

    }

    public function save()
    {
        $this->validate([
            'identification_document' => ['required', 'unique:guardians'],
            'name' => ['required'],
            'photo' => ['required', 'mimes:jpg,png', 'max:10000']
        ]);

        $guardian = Guardian::create([
            'identification_document' => $this->identification_document,
            'name' => $this->name,
            'photo' =>  $this->photo->store('photos')
        ]);

        $this->reset();

        $this->notification([
            'title'       => 'Responsável salvo!',
            'description' => 'Novo responsável criado com sucesso! ;)',
            'icon'        => 'success'
        ]);
    }

    public function render()
    {
        return view('livewire.guardian.guardians', [
            'guardians' => Guardian::latest()->paginate(10)
        ]);
    }
}
