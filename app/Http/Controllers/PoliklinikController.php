<?php

namespace App\Http\Controllers;

use App\Models\PoliklinikTable;
use Illuminate\Http\Request;

class PoliklinikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $poliklinik = PoliklinikTable::all();

        return response()->json(['message' => 'Succes menampilkan Poliklinik', 'poliklinik'=> $poliklinik]);
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
        $poliklinik = PoliklinikTable::create([
            'name_poliklinik' => $request->name_poliklinik,
        ]);

        return response()->json(['message' => 'Succes input poliklinik', 'poliklinik'=> $poliklinik]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $poliklinik = PoliklinikTable::findOrFail($id);

        return response()->json(['message' => 'Succes show poliklinik', 'poliklinik'=> $poliklinik]);
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
        $poliklinik = PoliklinikTable::findOrFail($id);
        $poliklinik->update([
            'name_poliklinik' => $request->name_poliklinik,
        ]);

        return response()->json(['message' => 'Succes update poliklinik', 'poliklinik'=> $poliklinik]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $poliklinik = PoliklinikTable::findOrFail($id);
        $poliklinik->delete();
        return response()->json(['message' => 'Succes delete poliklinik', 'poliklinik'=> $poliklinik]);
    }
}
