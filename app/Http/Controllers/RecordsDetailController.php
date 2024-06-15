<?php

namespace App\Http\Controllers;

use App\Models\RecordsDetailTable;
use Illuminate\Http\Request;

class RecordsDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $record = RecordsDetailTable::with('recordToPatient')->get();
        return response()->json(['message'=> "Menampilkan semua records", 'record'=> $record]);
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
            $record = RecordsDetailTable::create([
                'patient_id'=> $request->patient_id,
                'natrium' => $request->natrium,
                'kalium'=> $request->kalium,
                'kalsium' => $request->kalsium,
                'magnesium' => $request->magnesium,
                'fosfat'=> $request->fosfat,
                'bikarbonat'=> $request->bikarbonat,
                'klorida'=> $request->klorida,
            ]);
            return response()->json(['message' => 'Succes input records', 'record'=> $record]);
        } catch (\Throwable $th) {
            //print($th);
            return response()->json(['message' => 'Error :', $th]);
        }




    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $record = RecordsDetailTable::with('recordToPatient')->findOrFail($id);
        return response()->json(['message'=> "Menampilkan detail records", 'record'=> $record]);
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
    $record = RecordsDetailTable::findOrFail($id);

    // Lakukan pembaruan hanya pada atribut yang diberikan dalam request
    if ($request->has('patient_id')) {
        $record->patient_id = $request->patient_id;
    }

    if ($request->has('natrium')) {
        $record->natrium = $request->natrium;
    }

    if ($request->has('kalium')) {
        $record->kalium = $request->kalium;
    }

    if ($request->has('kalsium')) {
        $record->kalsium = $request->kalsium;
    }

    if ($request->has('magnesium')) {
        $record->magnesium = $request->magnesium;
    }

    if ($request->has('fosfat')) {
        $record->fosfat = $request->fosfat;
    }

    if ($request->has('bikarbonat')) {
        $record->bikarbonat = $request->bikarbonat;
    }

    $record->save();
    return response()->json(['message' => 'Success update records', 'records' => $record]);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $record = RecordsDetailTable::findOrFail($id);
        $record->delete();
        return response()->json(['message' => 'Success delete records', 'record' => $record]);
    }
}
