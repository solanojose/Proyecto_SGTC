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

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function documentType(){
        return $this->belongsTo(DocumentType::class,'id_document_type');
    }

    public function departament(){
        return $this->belongsTo(Departament::class,'id_departament');
    }

    public function city(){
        return $this->belongsTo(City::class,'id_city');
    }

    
}
