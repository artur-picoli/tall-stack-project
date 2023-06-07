<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Pagination\Paginator;

class Student extends Model
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
     * Localiza alunos pelo nome, ignorando os alunos já vinculados com o $guardian_id passado como parâmetro.
     *
     * @param string|null $search
     * @param int $guardian_id
     * @return Paginator|array
     */

    static function getStudentsBySearchIgnoringGuardianId($search, $guardian_id)
    {
        return static::query()->when($search, function ($query, $search) use ($guardian_id) {
            return $query->where('name', 'like', "%{$search}%")
                ->whereDoesntHave('guardians', function ($query) use ($guardian_id) {
                    return $query->where('guardian_id', $guardian_id);
                })->latest()->simplePaginate(5);
        }, function () {
            return [];
        });
    }


    public function guardians(): BelongsToMany
    {
        return $this->belongsToMany(Guardian::class)->using(GuardianStudent::class)->withPivot('type')->withTimestamps();
    }
}
