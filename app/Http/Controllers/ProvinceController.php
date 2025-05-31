<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $provinces = Province::all();
        return view('provinces.index', compact('provinces'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provinces = Province::all();
        return view('provinces.create', compact('provinces'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Province::create([
            'name' => $request->name,
        ]);

        return redirect()->route('provinces.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $provinces = Province::findOrFail($id);
        return view('provinces.edit',compact('provinces'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $provinces = Province::findOrFail($id);

        $provinces->update([
            'name' => $request->name,
        ]);

        return redirect()->route('provinces.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $provinces = Province::findOrFail($id);
        $provinces->delete();

        return redirect()->route('provinces.index');
    }
}
