<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lastname',
        'phone_number',
        'document_number',
        'id_document_type',
        'id_license_type',
        'experiencia',
        'disponibilidad',
    ];

    public function documentType()
    {
        return $this->belongsTo(DocumentType::class, 'id_document_type');
    }

    public function licenseType()
    {
        return $this->belongsTo(LicenseType::class, 'id_license_type');
    }
}
