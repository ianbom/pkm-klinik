<?php

namespace App\Http\Controllers;

use App\Models\DoctorTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctor = DoctorTable::join('hospital', 'doctor.hospital_id', '=', 'hospital.hospital_id')
                               ->join('poliklinik', 'doctor.poliklinik_id', '=', 'poliklinik.poliklinik_id')
                               ->select('doctor.*',
                                        'hospital.name_hospital',
                                        'hospital.address as hospital_address',
                                        'poliklinik.name_poliklinik',
                                        DB::raw("CASE WHEN doctor.gender = 0 THEN 'Female' ELSE 'Male' END AS gender_label"))
                               ->get();

        return response()->json(['message'=> "Menampilkan semua Doctor", 'doctor'=> $doctor]);
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
        $doctor = DoctorTable::create([
            'hospital_id'=> $request->hospital_id,
            'poliklinik_id' => $request->poliklinik_id,
            'name_doctor' => $request->name_doctor,
            'gender' => $request->gender,
            'nip_doctor'=> $request->nip_doctor,
            'address'=> $request->address,
            'no_phone'=> $request->no_phone
        ]);

        return response()->json(['message' => 'Succes input Doctor', 'doctor'=> $doctor]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $doctor = DoctorTable::join('hospital', 'doctor.hospital_id', '=', 'hospital.hospital_id')
        ->join('poliklinik', 'doctor.poliklinik_id', '=', 'poliklinik.poliklinik_id')
        ->select('doctor.*',
                 'hospital.name_hospital',
                 'hospital.address as hospital_address',
                 'poliklinik.name_poliklinik',
                 DB::raw("CASE WHEN doctor.gender = 0 THEN 'Female' ELSE 'Male' END AS gender_label"))
        ->findOrFail($id);

    return response()->json(['message'=> "Menampilkan detail Doctor", 'doctor'=> $doctor]);
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
    $doctor = DoctorTable::findOrFail($id);

    // Lakukan pembaruan hanya pada atribut yang diberikan dalam request
    if ($request->has('hospital_id')) {
        $doctor->hospital_id = $request->hospital_id;
    }

    if ($request->has('poliklinik_id')) {
        $doctor->poliklinik_id = $request->poliklinik_id;
    }

    if ($request->has('name_doctor')) {
        $doctor->name_doctor = $request->name_doctor;
    }

    if ($request->has('gender')) {
        $doctor->gender = $request->gender;
    }

    if ($request->has('nip_doctor')) {
        $doctor->nip_doctor = $request->nip_doctor;
    }

    if ($request->has('address')) {
        $doctor->address = $request->address;
    }

    if ($request->has('no_phone')) {
        $doctor->no_phone = $request->no_phone;
    }

    $doctor->save();

    return response()->json(['message' => 'Success update Doctor', 'doctor' => $doctor]);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $doctor = DoctorTable::findOrFail($id);
        $doctor->delete();
        return response()->json(['message' => 'Succes delete Doctor', 'doctor'=> $doctor]);
    }
}

