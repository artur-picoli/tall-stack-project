<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Pagination\Paginator;

class Guardian extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'identification_document',
        'document_type',
        'email',
        'phone',
        'photo',
        'document_photo',
        'observation'
    ];

    public function getDocumentTypeAttribute($value)
    {
        $documentTypes = [
            1 => 'CPF',
            2 => 'RG',
            3 => 'N° Doc',
        ];

        return $documentTypes[$value] ?? '';
    }

    /**
     * Localiza responsáveis pelo nome, ignorando os reponsáveis já vinculados com o $student_id passado como parâmetro.
     *
     * @param string|null $search
     * @param int $student_id
     * @return Paginator|array
     */

    static function getGuardiansBySearchIgnoringStudentId($search, $student_id)
    {
        return static::query()->when($search, function ($query, $search) use ($student_id) {
            return $query->where('name', 'like', "%{$search}%")
                ->whereDoesntHave('students', function ($query) use ($student_id) {
                    return $query->where('student_id', $student_id);
                })->latest()->simplePaginate(5);
        }, function () {
            return [];
        });
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class)->using(GuardianStudent::class)->withPivot('type')->withTimestamps();
    }
}
