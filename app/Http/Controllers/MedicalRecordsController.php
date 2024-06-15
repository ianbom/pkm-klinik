<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecordsTable;
use Illuminate\Http\Request;

class MedicalRecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medical = MedicalRecordsTable::with('medicalToDoctor', 'medicalToRecords.recordToPatient')->get();
        return response()->json(['message'=> "Menampilkan semua Medical", 'medical'=> $medical]);

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
        try {
            $medical = MedicalRecordsTable::create([
            'doctor_id' => $request->doctor_id,
            'records_id' => $request->records_id,
            'total_elektrolit' => $request->total_elektrolit,
            'diagnosa' => $request->diagnosa,
            'create_at' => $request->create_at
            ]);
            return response()->json(['message'=> "Sukses input Medical", 'medical'=> $medical]);
        } catch (\Throwable $th) {
            return response()->json([$th]);
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   try {
        $medical = MedicalRecordsTable::with('medicalToDoctor', 'medicalToRecords.recordToPatient')->findOrFail($id);
        return response()->json(['message'=> "Menampilkan detail Medical", 'medical'=> $medical]);
    } catch (\Throwable $th) {
        return response()->json([$th]);
    }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    try {
        $medical = MedicalRecordsTable::findOrFail($id);

        // Lakukan pembaruan hanya pada atribut yang diberikan dalam request
        if ($request->has('doctor_id')) {
            $medical->doctor_id = $request->doctor_id;
        }

        if ($request->has('records_id')) {
            $medical->records_id = $request->records_id;
        }

        if ($request->has('total_elektrolit')) {
            $medical->total_elektrolit = $request->total_elektrolit;
        }

        if ($request->has('diagnosa')) {
            $medical->diagnosa = $request->diagnosa;
        }

        if ($request->has('create_at')) {
            $medical->create_at = $request->create_at;
        }

        $medical->save();

        return response()->json(['message' => 'Success update Medical', 'medical' => $medical]);
    } catch (\Throwable $th) {
        return response()->json(['error' => $th->getMessage()], 500);
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $medical = MedicalRecordsTable::findOrFail($id);
        $medical->delete();
        return response()->json(['message'=> "Sukses menghapus Medical", 'medical'=> $medical]);
    }
}
