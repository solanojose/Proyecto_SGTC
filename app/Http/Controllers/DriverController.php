<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\DocumentType;
use App\Models\LicenseType;

class DriverController extends Controller
{
      /**
     * Mostrar el formulario para crear un nuevo conductor.
     */
    public function create()
{
    $documentTypes = DocumentType::all();
    $licenseTypes = LicenseType::all();
    
    return view('welcome', compact('documentTypes', 'licenseTypes'));
}


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'document_number' => 'required|integer',
            'id_document_type' => 'required|exists:document_types,id',
            'id_license_type' => 'required|exists:license_types,id',
            'experiencia' => 'required|string|max:255',
            'disponibilidad' => 'required|string|max:255',
        ]);

        Driver::create($request->all());
        return redirect()->route('drivers.create')->with('success', 'Conductor registrado con éxito.');
    }
}
