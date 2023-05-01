<?php

namespace App\Http\Livewire\Student;

use App\Models\Student;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Students extends Component
{

    use WithFileUploads, Actions, WithPagination;

    public $createClick = false;

    public $photo;

    public $identification_document;

    public $name;

    public function paginationView()
    {
        return 'livewire::pagination-links';
    }

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'nullable|mimes:jpg,png|max:10000',
        ]);
    }

    public function save()
    {
        $this->validate([
            'identification_document' => ['required', 'unique:students'],
            'name' => ['required'],
            'photo' => ['nullable', 'mimes:jpg,png', 'max:10000']
        ]);

        $student = Student::create([
            'identification_document' => $this->identification_document,
            'name' => $this->name,
            'photo' =>  $this->photo->store('photos')
        ]);

        $this->reset();

        $this->notification([
            'title'       => 'Aluno salvo!',
            'description' => 'Novo aluno criado com sucesso! ;)',
            'icon'        => 'success'
        ]);
    }

    public function create()
    {
        $this->createClick = true;
    }

    public function cancelCreate()
    {
        $this->createClick = false;
    }

    public function render()
    {
        return view('livewire.student.students', [
            'students' => Student::latest()->paginate(10)
        ]);
    }
}
