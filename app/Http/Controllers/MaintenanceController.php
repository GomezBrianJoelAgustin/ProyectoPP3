<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maintenance;
use App\Models\Machine;
use App\Models\MachineWork;
use App\Models\MaintenanceType;
use Illuminate\Support\Facades\Cache;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $maintenances = Maintenance::with(['machines', 'maintenanceTypes'])->get();
        
        return view('maintenances.index', compact('maintenances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $maintenances = Maintenance::all(); 
        $machines = Machine::all();
        $types = MaintenanceType::select('id', 'name')->distinct()->get();
        return view('maintenances.create', compact('maintenances','types', 'machines'));
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
    {

        $request->validate([
            'serial_number' => 'required|exists:machines,serial_number',
            'maintenance_date_start' => 'required|date',
            'type' => 'required|exists:maintenance_types,id',
        ]);

        $machine = Machine::where('serial_number', $request->serial_number)->first();

        Maintenance::create([
            'id_machine' => $machine->id,
            'maintenance_date_start' => $request->maintenance_date_start,
            'maintenance_date_end' => $request->maintenance_date_end,
            'type' => $request->type, 
        ]);

        return redirect()->route('maintenances.index')->with('success', 'Maintenance created successfully.');
    }

    /**
     * Display the specified resource.
     */
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Maintenance $maintenance)
    {
        $machines = Machine::all();
        $types = MaintenanceType::select('id', 'name')->distinct()->get();

        return view('maintenances.edit', compact('maintenance','types', 'machines'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Maintenance $maintenance)
    {
        // dd($request->all());
        $request->validate([
            'id_machine' => 'required|exists:machines,id',
            'maintenance_date_start' => 'required|date',
            'maintenance_date_end' => 'nullable|date',
            'type' => 'required|exists:maintenance_types,id',    
        ]);

        $maintenance->update([
            'id_machine' => $request->id_machine,
            'maintenance_date_start' => $request->maintenance_date_start,
            'maintenance_date_end' => $request->maintenance_date_end,
            'type' => $request->type,
        ]);

        return redirect()->route('maintenances.index')->with('success', '¡Maintenance update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Maintenance $maintenance)
    {
        $maintenance->delete();
        return redirect()->route('maintenances.index')->with('success', '¡Maintenance delete successfully');
    }
}
