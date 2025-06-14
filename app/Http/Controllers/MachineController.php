<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use App\Events\MaintenanceAlert;
use Illuminate\Validation\Rule; 
use App\Models\MachineType;
use App\Models\Machine;
use App\Models\Maintenance;
use App\Models\MachineWork;
use Illuminate\Http\Request;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $machines = Machine::with(['typeRelation', 'latestMachineWork'])
            ->get()
            ->map(function ($machine) {
                if ($machine->latestMachineWork && $machine->latestMachineWork->date_end === null) {
                    $machine->status = 'In use';
                } else {
                    $machine->status = 'Available';
                }
                return $machine;
            });

        $kmPorMaquina = [];

        foreach ($machines as $machine) { 
            $cacheKey = 'total_km_' . $machine->id;
            $kmPorMaquina[$machine->id] = Cache::get($cacheKey, 0);
        }

        // --- LÍNEA CORREGIDA ---
        // HAS ELIMINADO LA LLAMADA AL EVENTO DESDE AQUÍ.
        // La lógica de alerta de mantenimiento se maneja ahora en MachineWorkController.
        // --- FIN LÍNEA CORREGIDA ---

        return view('machines.index', compact('machines', 'kmPorMaquina'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = MachineType::all(); 
        $models = Machine::select('model')->distinct()->get();
        return view('machines.create', compact('types' , 'models'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'serial_number' => 'required|string|max:255|unique:machines',
            'type' => 'required|exists:machine_types,id',
            'model' => 'required|string|max:255',
        ]);

        $exists = Machine::where('serial_number', $request->serial_number)->exists();

        if ($exists) {
            return redirect()->back()->withInput();
        }

        Machine::create([
            'serial_number' => $request->serial_number,
            'type' => $request->type,
            'model' => $request->model,
        ]);

        return redirect()->route('machines.index')->with('success', '¡Machine create successfully');
    }

    /**
     * Display the specified resource.
     */
    public function maintenance()
    {
        $machines = Machine::with('maintenance.maintenanceTypes')->get();
        return view('machine', compact('machines'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Machine $machine)
    {
        $types = MachineType::all(); 
        $models = Machine::select('model')->distinct()->get();
        return view('machines.edit', compact('machine', 'types', 'models'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Machine $machine)
    {
        $request->validate([
            'serial_number' => 'required|string|max:255|unique:machines,serial_number,' . $machine->id,
            'type' => 'required|exists:machine_types,id',
            'model' => 'required|string|max:255',
        ]);

        $machine->update([
            'serial_number' => $request->serial_number,
            'type' => $request->type,
            'model' => $request->model,
        ]);

        return redirect()->route('machines.index')->with('success', 'Machine updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Machine $machine)
    {
        $machine->delete();
        return redirect()->route('machines.index')->with('success', 'Machine deleted successfully.');
    }
}