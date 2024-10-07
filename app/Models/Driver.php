<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_document_type',
        'document_number',
        'name',
        'lastname',
        'phone_number',
        'email',
        'id_license_type',
        'license_number',
        'f_exp_license',
        'f_ven_license',
        'experiencia',
        'id_status_drive',
    ];


    public function documentType()
    {
        return $this->belongsTo(DocumentType::class, 'id_document_type');
    }

    public function licenseType()
    {
        return $this->belongsTo(LicenseType::class, 'id_license_type');
    }

    public function statusDrive()
    {
        return $this->belongsTo(StatusDriver::class, 'id_status_drive');
    }


}


