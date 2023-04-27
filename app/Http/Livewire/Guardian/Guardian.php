<?php

namespace App\Http\Livewire\Guardian;

use Livewire\Component;

class Guardian extends Component
{

    // public string $name;

    // public string $email;

    // public array $teste;

    public function save()
    {
        dd('sasadsad');
        // $this->teste['name'] = $this->name;
        // $this->teste['email'] = $this->email;
    }

    public function render()
    {
        return view('livewire.guardian.guardian');
    }
}
