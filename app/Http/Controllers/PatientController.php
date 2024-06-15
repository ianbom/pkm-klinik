<?php

namespace App\Http\Controllers;

use App\Models\PatientTable;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patient = PatientTable::all();
        return response()->json(['message'=> "Menampilkan semua patient", 'patient'=> $patient]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $patient = PatientTable::create([
            'name_patient' => $request->name_patient,
            'gender' => $request->gender,
            'place_of_birth'=> $request->place_of_birth,
            'date_of_birth' => $request->date_of_birth,
            'age' => $request->age,
            'address'=> $request->address,
            'no_phone'=> $request->no_phone
        ]);

        return response()->json(['message' => 'Succes input patient', 'patient'=> $patient]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $patient = PatientTable::findOrFail($id);
        return response()->json(['message'=> "Menampilkan detail patient", 'patient'=> $patient]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $patient = PatientTable::findOrFail($id);

    // Lakukan pembaruan hanya pada atribut yang diberikan dalam request
    if ($request->has('name_patient')) {
        $patient->name_patient = $request->name_patient;
    }

    if ($request->has('gender')) {
        $patient->gender = $request->gender;
    }

    if ($request->has('place_of_birth')) {
        $patient->place_of_birth = $request->place_of_birth;
    }

    if ($request->has('date_of_birth')) {
        $patient->date_of_birth = $request->date_of_birth;
    }

    if ($request->has('age')) {
        $patient->age = $request->age;
    }

    if ($request->has('address')) {
        $patient->address = $request->address;
    }

    if ($request->has('no_phone')) {
        $patient->no_phone = $request->no_phone;
    }

    $patient->save();

    return response()->json(['message' => 'Success update patient', 'patient' => $patient]);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $patient = PatientTable::findOrFail($id);
        $patient->delete();
        return response()->json(['message' => 'Success delete patient', 'patient' => $patient]);
    }
}
