<?php

namespace App\Http\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;
use WireUi\Traits\Actions;


class EditPassword extends Component
{
    use Actions;

    public string $password = '';

    public string $passwordConfirmation = '';

    public string $currentPassword = '';

    public function rules()
    {
        return [
            'password' => ['required', Password::min(8)->mixedCase()->numbers()->symbols(), 'same:passwordConfirmation'],
            'passwordConfirmation' => ['required', Password::min(8)->mixedCase()->numbers()->symbols(), 'same:password'],
            'currentPassword' => ['required', 'current_password:web']
        ];
    }

    public function save()
    {
        $this->validate();

        $user = Auth::user();

        $user->password = Hash::make($this->password);

        $user->save();

        $this->reset();

        $this->notification([
            'title'       => 'Senha salva!',
            'description' => 'Seu senha foi alterada com sucesso! ;)',
            'icon'        => 'success'
        ]);
    }

    public function render()
    {
        return view('livewire.profile.edit-password');
    }
}
