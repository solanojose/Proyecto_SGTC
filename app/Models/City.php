<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Departament;

class City extends Model
{
    use HasFactory; 
    
    protected $fillable = [
        "name",
        "id_departament",
    ];

    public function departament()
    {  
        return $this->belongsTo(Departament::class, 'id_departament');
    }
}
