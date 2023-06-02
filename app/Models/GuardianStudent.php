<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Relations\Pivot;

class GuardianStudent extends Pivot
{

    protected $fillable = [
        'type'
    ];

    public static function validateMaxGuardianStudent(Student $student, Guardian $guardian)
    {
        if($student->guardians()->count() >= 5) {
            throw new Exception('Não é possível vincular, pois o aluno(a) <b>' . $student->name . '</b> já possui 5 responsáveis');
        }

        if ($guardian->students()->count() >= 5) {
            throw new Exception('Não é possível vincular, pois o(a) responsável <b>' . $guardian->name . '</b> já possui 5 alunos');
        }

    }
}
