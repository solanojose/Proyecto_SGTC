<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\LicenseType;
use App\Models\DocumentType;
use App\Models\StatusDriver;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class DriverController extends Controller
{
    public function create()
    {
        $documentTypes = DocumentType::all();
        $licenseTypes = LicenseType::all();
        $statusDrivers = StatusDriver::all();

        return view('Admin.registerDriver', compact('documentTypes', 'licenseTypes', 'statusDrivers'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [

                'name' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'email' => 'required|string|email|unique:users,email',
                'password' => 'required|string|min:8|confirmed',

                'id_document_type' => 'required|exists:document_types,id',
                'document_number' => 'required|integer|unique:drivers,document_number',
                'phone_number' => 'required|string|max:20',
                'id_license_type' => 'required|exists:license_types,id',
                'license_number' => 'required',
                'f_exp_license' => 'required|date',
                'f_ven_license' => 'required|date|after:f_exp_license',
                'experiencia' => 'required|integer|min:0',
                'id_status_drive' => 'required|exists:status_drivers,id',
            ],

            [
                'document_number.unique' => 'El número de documento ya se encuentra registrado',
                'document_number.integer' => 'El número de documento debe contener solo números',
                'email.unique' => 'El correo ya está en uso',
                'password.min' => 'La contraseña debe tener al menos 8 caracteres',
                'password.confirmed' => 'Las contraseñas no coinciden.',
                'f_ven_license.after' => 'La fecha de vencimiento tiene que ser posterior a la de expedición',
            ]
        );

        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'lastname' => $request->lastname,
            'password' => Hash::make($request->password),

        ]);

        $user->roles()->attach(3);

        $driver = new Driver();
        $driver->user_id = $user->id;
        $driver->id_document_type = $request->id_document_type;
        $driver->document_number = $request->document_number;
        $driver->phone_number = $request->phone_number;
        $driver->id_license_type = $request->id_license_type;
        $driver->license_number = $request->license_number;
        $driver->f_exp_license = $request->f_exp_license;
        $driver->f_ven_license = $request->f_ven_license;
        $experienciaValue = $request->experiencia;
        $driver->experiencia = $experienciaValue . ' ' . ($experienciaValue == 1 ? 'año' : 'años');
        $driver->id_status_drive = $request->id_status_drive;
        $driver->save();

        return redirect()->route('drivers.create')->with('success', 'Conductor registrado con éxito');
    }


    public function index()
    {

        $drivers = Driver::with('user', 'documentType', 'licenseType', 'statusDriver')->get();

        return view('Admin.showDrivers', compact('drivers'));
    }

    public function driverId($id)
    {

        $driver = Driver::findOrFail($id);

        $documentTypes = DocumentType::all();
        $licenseTypes = LicenseType::all();
        $statusDrivers = StatusDriver::all();

        return view('Admin.editDriver', compact('driver', 'documentTypes', 'licenseTypes', 'statusDrivers'));
    }

    public function update(Request $request, $id)
    {
        $driver = Driver::findOrFail($id);

        $request->validate(
            [
                'name' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'document_number' => 'required|string|max:50',
                'phone_number' => 'required|string|max:15',
                'id_document_type' => 'required|exists:document_types,id',
                'id_license_type' => 'required|exists:license_types,id',
                'license_number' => 'required|string|max:50',
                'f_exp_license' => 'required|date',
                'f_ven_license' => 'required|date',
                'experiencia' => 'nullable|string|max:255',
                'id_status_drive' => 'required|exists:status_drivers,id',
            ],

            [
                'document_number.unique' => 'El número de documento ya se encuentra registrado',
                'document_number.integer' => 'El número de documento debe contener solo números',
                'email.unique' => 'El correo ya está en uso',
                'f_ven_license.after' => 'La fecha de vencimiento tiene que ser posterior a la de expedición',
            ]
        );

        $driver->user->name = $request->name;
        $driver->user->lastname = $request->lastname;
        $driver->user->email = $request->email;
        $driver->document_number = $request->document_number;
        $driver->phone_number = $request->phone_number;
        $driver->id_document_type = $request->id_document_type;
        $driver->id_license_type = $request->id_license_type;
        $driver->license_number = $request->license_number;
        $driver->f_exp_license = $request->f_exp_license;
        $driver->f_ven_license = $request->f_ven_license;
        $driver->experiencia = $request->experiencia;
        $driver->id_status_drive = $request->id_status_drive;


        $driver->user->save();
        $driver->save();

        return redirect()->route('drivers.edit', $id)->with('success', 'Conductor actualizado correctamente.');
    }


    public function destroy($id)
    {

        $driver = Driver::findOrFail($id);
        $user = $driver->user;
        $driver->delete();

        if ($user) {

            $user->roles()->detach();
            $user->delete();
        }

        return redirect()->route('drivers.index')->with('success', 'Conductor eliminado exitosamente.');
    }


    public function profile()
    {
        return view('Driver.viewDriver');
    }
}
