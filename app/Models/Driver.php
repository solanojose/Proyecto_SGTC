<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'id_document_type',
        'document_number',
        'phone_number',
        'id_license_type',
        'license_number',
        'f_exp_license',
        'f_ven_license',
        'experiencia',
        'id_status_drive',
    ];


    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function documentType()
    {
        return $this->belongsTo(DocumentType::class, 'id_document_type');
    }

    public function licenseType()
    {
        return $this->belongsTo(LicenseType::class, 'id_license_type');
    }

    public function statusDriver()
    {
        return $this->belongsTo(StatusDriver::class, 'id_status_drive');
    }


}


