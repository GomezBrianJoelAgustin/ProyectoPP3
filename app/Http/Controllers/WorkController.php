<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\Province;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $works = Work::with('provinces')->get();
        return view('works.index', compact('works'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $works = Work::all();
        $provinces = Province::all();
        return view('works.create', compact('works','provinces'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255|unique:works',
            'province' => 'required|exists:provinces,id',
            'date_start' => 'required|date',
            'date_end' => 'nullable|date',

        ]);

        Work::create([
               'name' => $request->name,
               'province' => $request->province,
               'date_start' => $request->date_start,
               'date_end' => $request->date_end,
        ]);

        return redirect()->route('works.index');
    }

    /**
     * Display the specified resource.
     */
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Work $work)
    {
        $provinces = Province::all();
        return view('works.edit', compact ('work', 'provinces'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Work $work)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255|unique:works,name,' . $work->id,            
            'province' => 'required|exists:provinces,id',
            'date_start' => 'required|date',
            'date_end' => 'nullable|date',

            
        ]);

        $work->update([
               'name' => $request->name,
               'province' => $request->province,
               'date_start' => $request->date_start,
               'date_end' => $request->date_end,
        ]);

        return redirect()->route('works.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Work $work)
    {
        $work->delete();
        return redirect()->route('works.index');
    }
}
