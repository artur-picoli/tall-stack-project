<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Student;
use Livewire\Component;

class Dashboard extends Component
{

    protected $listeners = ['echo-private:channel-teste, TesteEvent'=> 'teste'];

    public function teste()
    {
        dd('ihih');
    }


    public function getCountStudentsProperty()
    {
        return Student::all()->count();
    }

    public function render()
    {
        return view('livewire.dashboard.dashboard');
    }
}
