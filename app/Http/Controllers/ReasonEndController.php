<?php

namespace App\Http\Controllers;

use App\Models\ReasonEnd;
use Illuminate\Http\Request;

class ReasonEndController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reasonEnds = ReasonEnd::all();

        return view('reasonEnds.index', compact('reasonEnds'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $reasonEnds = ReasonEnd::all();

        return view('reasonEnds.create', compact('reasonEnds'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255',
        ]);

        ReasonEnd::create([
            'type' => $request->type,
        ]);

        return redirect()->route('reasonEnds.index')->with('success', 'Reason End create successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $reasonEnds = ReasonEnd::findOrFail($id);

        return view('reasonEnds.edit',compact('reasonEnds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required|string|max:255',
        ]);

        $reasonEnds = ReasonEnd::findOrFail($id);

        $reasonEnds->update([
            'type' => $request->type,
        ]);

        return redirect()->route('reasonEnds.index')->with('success', 'Reason End update successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $reasonEnds = ReasonEnd::findOrFail($id);
        $reasonEnds->delete();
        
        return redirect()->route('reasonEnds.index')->with('success', 'Reason End delete successfully');
    }
}
