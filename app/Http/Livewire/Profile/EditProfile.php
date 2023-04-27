<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class EditProfile extends Component
{
    use WithFileUploads, Actions;

    public $photo;

    public string $name;

    public string $email;

    public $userPhoto;



    public function rules()
    {
        return [
            'email' => ['required', 'email', Rule::unique(User::class)->ignore(Auth::user()->id)],
            'name' => ['required'],
            'photo' => ['nullable', 'mimes:jpg,png', 'max:10000']
            // 'password' => ['sometimes','nullable','min:8','same:passwordConfirmation'],
            // 'passwordConfirmation' => ['sometimes','nullable','min:8','same:password'],
        ];
    }


    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'nullable|mimes:jpg,png|max:10000',
        ]);
    }

    public function mount()
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->userPhoto = Auth::user()->photo;
    }

    public function save()
    {
        $this->validate();

        $user = Auth::user();
        $user->email = $this->email;
        $user->name = $this->name;

        if ($this->photo) {
            $user->photo = $this->photo->store('photos');
        }
        if ($user->isDirty()) {
            $user->save();
        };

        $this->notification([
            'title'       => 'Perfil salvo!',
            'description' => 'Seu perfil foi salvo com sucesso! ;)',
            'icon'        => 'success'
        ]);
    }

    public function render()
    {
        return view('livewire.profile.edit-profile');
    }
}
