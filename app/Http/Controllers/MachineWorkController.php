<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use App\Events\MachineWorkCreated;
use Illuminate\Support\Str;
use App\Models\MachineWork;
use App\Models\Machine;
use App\Models\Work;
use App\Models\ReasonEnd;
use Illuminate\Http\Request;

class MachineWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     
        $inProgress = MachineWork::whereNull('date_end') 
                                  ->orderBy('date_start', 'desc') 
                                  ->get();


        $finished = MachineWork::whereNotNull('date_end') 
                                ->orderBy('date_start', 'desc') 
                                ->get();

        return view('machineWorks.index', compact('inProgress', 'finished'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $usedMachineIds = MachineWork::whereNull('date_end')->pluck('id_machines');
        $machines = Machine::whereNotIn('id', $usedMachineIds)->get();
        $works = Work::whereNotNull('date_end')->get(); 

        $reasonEnds = ReasonEnd::all();

        return view('machineWorks.create', compact('machines', 'works', 'reasonEnds'));
        }




    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'date_start' => 'required|date',
            'id_machines' => 'required|exists:machines,id',
            'id_works' => 'required|exists:works,id',
        ]);

        $machineWorks = MachineWork::create([
                'date_start' => $request->date_start,
                'id_machines' => $request->id_machines,
                'id_works' => $request->id_works,
        ]);

        \Log::info('CONTROLADOR: Evento MachineWorkCreated disparado.');

        event(new MachineWorkCreated($machineWorks));
        return redirect()->route('machineWorks.index')->with('success', '¡MachineWork create successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(MachineWork $machine_work)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $machine_work = MachineWork::findOrFail($id);
        $works = Work::all();
        $machines = Machine::all();
        $reasonEnds = ReasonEnd::all();
        return view('machineWorks.edit', compact('works','machines','reasonEnds','machine_work'));
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'reason_end' => 'required|exists:reason_ends,id',
            'km_travel' => 'required|numeric|min:0',
            'id_machines' => 'required|exists:machines,id',
            'id_works' => 'required|exists:works,id',
        ]);

        $machine_work = MachineWork::findOrFail($id);
        $cacheKey = 'total_km_' . $machine_work->id_machines;
        $currentKm = Cache::get($cacheKey, 0);
        $adjustedKm = $currentKm - $machine_work->km_travel + $request->km_travel;
        Cache::put($cacheKey, $adjustedKm);

        $machine_work->update([ 
            'date_start' => $request->date_start,
            'date_end' => $request->date_end,
            'reason_end' => $request->reason_end,
            'km_travel' => $request->km_travel,
            'id_machines' => $request->id_machines,
            'id_works' => $request->id_works,
        ]);

        return redirect()->route('machineWorks.index')->with('success', 'Machine work updated successfully.');
    }

    public function finish($id)
    {
        $machine_work = MachineWork::findOrFail($id);
        $reasonEnds = ReasonEnd::all();
        return view('machineWorks.finish', compact('reasonEnds','machine_work'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function storeFinish(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'date_end' => 'required|date',
            'reason_end' => 'required|exists:reason_ends,id',
            'km_travel' => 'required|numeric|min:0',
            'id_machines' => 'required|exists:machines,id',
        ]);

        $machine_work = MachineWork::findOrFail($id);
        $cacheKey = 'total_km_' . $request->id_machines;
        $currentKm = Cache::get($cacheKey, 0);
        Cache::put($cacheKey, $currentKm + $request->km_travel);

        $machine_work->update([ 
            'date_end' => $request->date_end,
            'reason_end' => $request->reason_end,
            'km_travel' => $request->km_travel,
            'id_machines' => $request->id_machines,
        ]);

        return redirect()->route('machineWorks.index')->with('success', 'Machine work finish successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $machine_work = MachineWork::findOrFail($id);

        $cacheKey = 'total_km_' . $machine_work->id_machines;
        $currentKm = Cache::get($cacheKey, 0);
        Cache::put($cacheKey, max(0, $currentKm - $machine_work->km_travel));

        $machine_work->delete();
        
        return redirect()->route('machineWorks.index')->with('success', 'Machine work delete successfully.');;
    }
}