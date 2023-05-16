<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Student;
use Livewire\Component;

class Dashboard extends Component
{

    protected $listeners = ['echo-private:studentsCount,StudentCreate'=> '$refresh'];

    public function getCountStudentsProperty()
    {
        return Student::all()->count();
    }

    public function render()
    {
        return view('livewire.dashboard.dashboard');
    }
}
