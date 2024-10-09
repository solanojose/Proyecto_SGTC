<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\LicenseType;
use App\Models\DocumentType;
use App\Models\StatusDriver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            'password' => 'required|string|min:8|confirmed',
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
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
            'password.confirmed' => 'Las contraseñas no coinciden.',
            'f_ven_license.after' => 'La fecha de vencimiento tiene que ser posterior a la de expedición',
        ]);

        Driver::create([
            'id_document_type' => $request->id_document_type,
            'document_number' => $request->document_number,
            'name' => $request->name,
            'lastname' => $request->lastname,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
            'license_number' => $request->license_number,
            'id_license_type' => $request->id_license_type,
            'f_exp_license' => $request->f_exp_license,
            'f_ven_license' => $request->f_ven_license,
            'experiencia' => $request->experiencia,
            'id_status_drive' => $request->id_status_drive,
        ]);

        // User::create([
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        return redirect()->route('drivers.create')->with('success', 'Conductor registrado con éxito.');
    }


}
