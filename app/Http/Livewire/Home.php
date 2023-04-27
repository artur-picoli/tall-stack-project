<?php

namespace App\Http\Livewire;

use Livewire\Component;
use WireUi\Traits\Actions;

class Home extends Component
{
    use Actions;

    public function render()
    {

        return view('livewire.home');
    }
}
