<?php

namespace App\Http\Livewire\Profile;

use Livewire\Component;

class ProfilePhoto extends Component
{

    protected $listeners = [
        'refreshPhoto' => '$refresh'
    ];

    public function getProfilePhotoProperty()
    {
       return auth()->user()->photo;
    }

    public function render()
    {
        return view('livewire.profile.profile-photo');
    }
}
