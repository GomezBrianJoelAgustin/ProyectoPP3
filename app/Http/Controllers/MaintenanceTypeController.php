<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceType;
use Illuminate\Http\Request;

class MaintenanceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $maintenanceTypes = MaintenanceType::all();

        return view('maintenanceTypes.index', compact('maintenanceTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $maintenanceTypes = MaintenanceType::all();

        return view('MaintenanceTypes.create', compact('maintenanceTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        MaintenanceType::create([
            'name' => $request->name,
        ]);

        return redirect()->route('maintenanceTypes.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $maintenanceTypes = MaintenanceType::findOrFail($id);

        return view('maintenanceTypes.edit', compact('maintenanceTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $maintenanceTypes = MaintenanceType::findOrFail($id);

        $maintenanceTypes->update([
            'name' => $request->name,
        ]);

        return redirect()->route('maintenanceTypes.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $maintenanceTypes = MaintenanceType::findOrFail($id);
        $maintenanceTypes->delete();

        return redirect()->route('maintenanceTypes.index');
    }
}
