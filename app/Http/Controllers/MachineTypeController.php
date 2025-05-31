<?php

namespace App\Http\Controllers;

use App\Models\MachineType;
use Illuminate\Http\Request;

class MachineTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $machineTypes = MachineType::all();
        return view('machineTypes.index', compact('machineTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $machineTypes = MachineType::all();
        return view('machineTypes.create',compact('machineTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        MachineType::create([
            'name' => $request->name,
        ]);

        return redirect()->route('machineTypes.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $machineTypes = MachineType::findOrFail($id);
        return view('machineTypes.edit', compact('machineTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $machineTypes = MachineType::findOrFail($id);

        $machineTypes->update([
            'name' => $request->name,
        ]);

        return redirect()->route('machineTypes.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $machineTypes = MachineType::findOrFail($id);
        $machineTypes->delete();
        return redirect()->route('machineTypes.index');
    }
}