<?php

namespace App\Http\Livewire\Auth\Passwords;

use Livewire\Component;

class Confirm extends Component
{
    /** @var string */
    public $password = '';

    public function confirm()
    {
        $this->validate([
            'password' => 'required|current_password',
        ]);

        session()->put('auth.password_confirmed_at', time());

        return redirect()->intended(route('inicio'));
    }

    public function render()
    {
        return view('livewire.auth.passwords.confirm');
    }
}
