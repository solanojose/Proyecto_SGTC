<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'id_document_type',
        'document_number',
        'phone_number',
        'id_departament',
        'id_city',
        'address',
        'neighborhood',
    ] ;
}
