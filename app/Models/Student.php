<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    protected $documentTypeLabels = [
        1 => 'CPF',
        2 => 'RG',
        3 => 'N° Doc',
    ];

    public function getDocumentTypeLabelAttribute()
    {
        return $this->documentTypeLabels[$this->attributes['document_type']];
    }

    public function getLabelDocumentType($type)
    {
        return $this->documentTypeLabels[$type];
    }

    public function guardians() : BelongsToMany
    {
        return $this->belongsToMany(Guardians::class, 'guardian_student', 'student_id' , 'guardian_id');
    }

}
