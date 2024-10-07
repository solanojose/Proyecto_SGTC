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

        return view('welcome', compact('documentTypes', 'licenseTypes', 'statusDrivers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_document_type' => 'required|exists:document_types,id',
            'document_number' => 'required|integer',
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'required',
            'id_license_type' => 'required|exists:license_types,id',
            'license_number'=>'required|integer', 
            'f_exp_license' => 'required',
            'f_ven_license' => 'required',      
            'experiencia' => 'required|string|max:255',
            'id_status_drive' => 'required|exists:status_drivers,id',
        ]);

        Driver::create($request->all());
        return redirect()->route('drivers.create')->with('success', 'Conductor registrado con éxito.');
    }


}
