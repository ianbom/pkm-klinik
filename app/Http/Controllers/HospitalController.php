<?php

namespace App\Http\Controllers;

use App\Models\HospitalTable;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function index()
    {
        $hospital = HospitalTable::all();

        return response()->json(['message'=> "Menampilkan semua Hospital", 'hospital'=> $hospital]);
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
        $hospital = HospitalTable::create([
            'name_hospital' => $request->name_hospital,
            'address'=> $request->address
        ]);

        return response()->json(['message' => 'Succes input Hospital', 'hospital'=> $hospital]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $hospital = HospitalTable::findOrFail($id);

        return response()->json(['message' => 'Menampilkan data hospital', 'hospital' => $hospital]);
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
        $hospital = HospitalTable::findOrFail($id)  ;
        $hospital->update([
            'name_hospital'=> $request->name_hospital,
            'address'=> $request->address
        ]);

        return response()->json(['message' => 'Succes update Hospital', 'hospital'=> $hospital]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hospital = HospitalTable::findOrFail($id);
        $hospital->delete();

        return response()->json(['message' => 'Succes delete Hospital', 'hospital'=> $hospital]);
    }
}
