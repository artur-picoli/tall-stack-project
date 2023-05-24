<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function students() : BelongsToMany
    {
        return $this->belongsToMany(Student::class)->using(GuardianStudent::class)->withPivot('type')->withTimestamps();
    }
}
