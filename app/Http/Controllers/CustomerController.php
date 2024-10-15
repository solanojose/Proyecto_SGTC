<?php

namespace App\Http\Controllers;

use App\Models\Departament;
use App\Models\DocumentType;
use App\Models\City;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class CustomerController extends Controller
{

    public function citiesByDepartament(Request $request)
    {
        $cities = City::where('id_departament', $request->id)->get();
        return response()->json($cities);
    }

    public function create(){

        $documentTypes =  DocumentType::all();
        $departaments = Departament::all();
        $cities = City::class::all();

        return view('Admin.registerCustomer', compact('documentTypes','departaments','cities'));
    }

    public function store(Request $request){
        $request->validate([
            
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',

            'id_document_type' => 'required|exists:document_types,id',
            'document_number' => 'required|integer|unique:customers,document_number',
            'phone_number' => 'required|string|max:20',
            'id_departament'=> 'required|exists:departaments,id',
            'id_city'=> 'required|exists:cities,id',
            'address'=> 'required|string|max:100',
            'neighborhood' => 'required|string|max:100'
        ],
        [
            'document_number.unique' => 'El número de documento ya se encuentra registrado',
            'document_number.integer' => 'El número de documento debe contener solo números',
            'email.unique' => 'El correo ya está en uso', 
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ]);

        $user = User::create([
            'email'=> $request->email,
            'name' => $request->name,
            'lastname'=> $request->lastname,
            'password'=> Hash::make($request->password),
        ]);

        $user->roles()->attach(2);

        $customer = new Customer();
        $customer->user_id=$user->id;
        $customer->id_document_type=$request->id_document_type;
        $customer->document_number=$request->document_number;
        $customer->phone_number=$request->phone_number;
        $customer->id_departament=$request->id_departament;
        $customer->id_city=$request->id_city;
        $customer->address=$request->address;
        $customer->neighborhood=$request->neighborhood;
        $customer->save();

        return redirect()->route('customers.create')->with('success', 'Cliente registrado con éxito');
    
    }

    public function profile()
    {
        return view('Customer.viewCustomer');
    }
}
