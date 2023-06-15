<?php

namespace App\Http\Livewire\Profile;

use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EditProfile extends Component
{
    use WithFileUploads, Actions;

    public $photo;

    public string $name;

    public string $email;

    public $passwordConfirm;

    public $userPhoto;

    public function rules()
    {
        return [
            'email' => ['required', 'email', Rule::unique(User::class)->ignore(Auth::user()->id)],
            'name' => ['required'],
            'photo' => ['nullable', 'mimes:jpg,png', 'max:10000'],
            'passwordConfirm' => ['required', 'current_password:web']
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

    public function update()
    {
        $validated = $this->validate();

        $user = Auth::user();

        if ($validated['photo']) {
            if ($user->photo && Storage::exists($user->photo)) {
                Storage::delete($user->photo);
            }
            $validated['photo'] = $validated['photo']->store('photos');
        }

        $user->fill(array_filter($validated));

        if ($user->isDirty()) {
            $user->save();
        };

        $this->notification([
            'title'       => 'Perfil salvo!',
            'description' => 'Seu perfil foi salvo com sucesso! ;)',
            'icon'        => 'success'
        ]);

        $this->emitTo('profile.profile-photo', 'refreshPhoto');

        $this->reset('passwordConfirm');
    }

    public function render()
    {
        return view('livewire.profile.edit-profile');
    }
}
