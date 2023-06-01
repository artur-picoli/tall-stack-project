<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Verify extends Component
{
    public bool $resent = false;

    public function mount()
    {
        if (Auth::user()->hasVerifiedEmail()) {
            redirect(route('inicio'));
        }
    }

    public function resend()
    {
        if (Auth::user()->hasVerifiedEmail()) {
            redirect(route('inicio'));
        }

        Auth::user()->sendEmailVerificationNotification();

        $this->emit('resent');

        $this->resent = true;
    }

    public function closeResentMessage()
    {
        $this->reset('resent');
    }

    public function render()
    {
        return view('livewire.auth.verify');
    }
}
