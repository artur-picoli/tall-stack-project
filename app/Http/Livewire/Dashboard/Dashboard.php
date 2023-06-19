<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Student;
use Livewire\Component;
use App\Models\Guardian;

class Dashboard extends Component
{

    protected $listeners = [
        'echo-private:guardiansStudentsCount,GuardianStudentCreate' => '$refresh',
    ];

    public function getCountStudentsProperty()
    {
        $result = Student::selectRaw('COUNT(*) as count, MAX(created_at) as lastCreatedAt')->first();

        return [
            'count' =>  $result->count,
            'lastCreatedAt' => $result->lastCreatedAt
        ];
    }

    public function getCountGuardiansProperty()
    {
        $result = Guardian::selectRaw('COUNT(*) as count, MAX(created_at) as lastCreatedAt')->first();

        return [
            'count' =>  $result->count,
            'lastCreatedAt' => $result->lastCreatedAt
        ];
    }

    public function render()
    {
        return view('livewire.dashboard.dashboard');
    }
}
