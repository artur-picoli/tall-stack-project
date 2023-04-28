<?php

namespace App\Http\Livewire\Student;

use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class Student extends Component
{
    use WithFileUploads, Actions;

    public string $name;

    public string $email;

    public $photo;


    // public function rules()
    // {
    //     return [
    //         'email' => ['required', 'email', Rule::unique(User::class)->ignore(Auth::user()->id)],
    //         'name' => ['required'],
    //         'photo' => ['nullable', 'mimes:jpg,png', 'max:10000']
    //         // 'password' => ['sometimes','nullable','min:8','same:passwordConfirmation'],
    //         // 'passwordConfirmation' => ['sometimes','nullable','min:8','same:password'],
    //     ];
    // }


    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'nullable|mimes:jpg,png|max:10000',
        ]);
    }

    // public function mount()
    // {
    //     $this->name = Auth::user()->name;
    //     $this->email = Auth::user()->email;
    //     $this->userPhoto = Auth::user()->photo;
    // }

    public function save()
    {
    }

    public function render()
    {
        return view('livewire.student.student');
    }
}
