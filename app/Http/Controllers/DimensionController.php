<?php

namespace App\Http\Controllers;

use App\Models\Dimension;
use Illuminate\Http\Request;

class DimensionController extends Controller
{
    public function index()
    {
        $dimensions = Dimension::orderBy('order', 'ASC')->get();
        return view('admin.dimensions.index', compact('dimensions'));
    }

    public function create()
    {
        return view('admin.dimensions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:225|unique:dimensions',
            'order' => 'required|unique:dimensions',
            'low_percentile_description' => 'nullable|string',
            'high_percentile_description' => 'nullable|string',
        ]);

        Dimension::create([
            'name' => $request->name,
            'order' => $request->order,
            'low_percentile_description' => $request->low_percentile_description,
            'high_percentile_description' => $request->high_percentile_description,
        ]);

        return redirect()->route('admin.dimensions');
    }

    public function edit(Dimension $dimension)
    {
        return view('admin.dimensions.edit', compact('dimension'));
    }

    public function update(Request $request, Dimension $dimension)
    {
        $request->validate([
            'name' => 'required|max:225|unique:dimensions,name,' . $dimension->id,
            'order' => 'required|unique:dimensions,order,' . $dimension->id,
            'low_percentile_description' => 'nullable|string',
            'high_percentile_description' => 'nullable|string',
        ]);

        $dimension->name = $request->name;
        $dimension->low_percentile_description = $request->low_percentile_description;
        $dimension->high_percentile_description = $request->high_percentile_description;
        $dimension->save();

        return back()->with('success', 'Dimensi berhasil diupdate');
    }

    public function destroy(Dimension $dimension)
    {
        $dimension->delete();
        return back();
    }
}
