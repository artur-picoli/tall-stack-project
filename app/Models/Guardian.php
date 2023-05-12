<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    protected $documentTypeLabels = [
        1 => 'CPF',
        2 => 'RG',
        3 => 'N° Doc',
    ];

    public function getDocumentTypeLabelAttribute()
    {
        return $this->documentTypeLabels[$this->attributes['document_type']];
    }
}
