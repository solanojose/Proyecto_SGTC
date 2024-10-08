<?php

namespace App\Http\Controllers;

use App\Models\DocumentType;
use App\Models\Driver;
use App\Models\LicenseType;
use App\Models\StatusDriver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function create()
    {
        $documentTypes = DocumentType::all();
        $licenseTypes = LicenseType::all();
        $statusDrivers = StatusDriver::all();

        return view('saveDriver', compact('documentTypes', 'licenseTypes', 'statusDrivers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_document_type' => 'required|exists:document_types,id',
            'document_number' => 'required|integer|unique:drivers,document_number',
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|string|email|unique:drivers,email',
            'id_license_type' => 'required|exists:license_types,id',
            'license_number' => 'required',
            'f_exp_license' => 'required|date',
            'f_ven_license' => 'required|date|after:f_exp_license', 
            'experiencia' => 'required|string|max:255',
            'id_status_drive' => 'required|exists:status_drivers,id',
        ], [
            'document_number.unique' => 'El número de documento ya se encuentra registrado',
            'document_number.integer' => 'El número de documento debe contener solo números',
            'email.unique' => 'El correo ya está en uso', 
            'f_ven_license.after' => 'La fecha de vencimiento tiene que ser posterior a la de expedición',
        ]);

        Driver::create($request->all());
        return redirect()->route('drivers.create')->with('success', 'Conductor registrado con éxito.');
    }


}
