<?php

namespace App\Http\Controllers;

use App\Models\Dimension;
use App\Models\Instrument;
use Illuminate\Http\Request;

class InstrumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instruments = Instrument::with('dimension')->orderBy('numbering')->get();
        return view('admin.instruments.index',compact('instruments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dimensions = Dimension::orderBy('order')->get();
        return view('admin.instruments.create', compact('dimensions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:255',
            'numbering' => 'required|integer|unique:instruments', 
            'reverse' => 'required',
            'dimension' => 'required|in:' .  implode(',', Dimension::pluck('id')->toArray())
        ]);

        Instrument::create([
            'content' => $request->content,
            'numbering' => $request->numbering,
            'reverse' => $request->reverse,
            'dimension_id' => $request->dimension,
        ]);

        return redirect()->route('admin.instruments');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instrument $instrument)
    {
        $dimensions = Dimension::orderBy('order')->get();
        return view('admin.instruments.edit', compact('instrument', 'dimensions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instrument $instrument)
    {
        $request->validate([
            'content' => 'required|string|max:255',
            'numbering' => 'required|integer|unique:instruments,numbering,' . $instrument->id, 
            'reverse' => 'required',
            'dimension' => 'required|in:' .  implode(',', Dimension::pluck('id')->toArray())
        ]);

        $instrument->content = $request->content;
        $instrument->numbering = $request->numbering;
        $instrument->reverse = $request->reverse;
        $instrument->dimension_id = $request->dimension;
        $instrument->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instrument $instrument)
    {
        $instrument->delete();
        return back();
    }
}
