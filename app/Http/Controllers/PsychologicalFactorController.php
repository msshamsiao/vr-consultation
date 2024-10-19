<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PsychologicalFactor;
use Illuminate\Support\Facades\Log;

class PsychologicalFactorController extends Controller
{
    public function index(Request $request) 
    {

    }

    public function create() 
    {
        $psychologicalFactor = PsychologicalFactor::all();
        return view('psychological_factors.create', compact('psychologicalFactor'));
    }

    public function store(Request $request) 
    {   
        try {
            PsychologicalFactor::create($request->all());

            Log::info('Psychological factors created successfully.', ['request' => $request->all()]);
            return redirect()->route('psychological_factors.index')->with('success', 'Psychological factors created successfully.');

        } catch (\Exception $e) {
            Log::error('Failed to create psychological factors.', ['exception' => $e]);
            return back()->withErrors(['error' => 'Failed to create psychologicak factors. ' . $e->getMessage()]);
        }
    }

    public function edit(PsychologicalFactor $psychologicalFactor)
    {
        return view('psychological_factors.edit', compact('psychologicalFactor'));
    }

    public function update(Request $request, PsychologicalFactor $psychologicalFactor)
    {
        $psychologicalFactor->update($request->all());

        return redirect()->route('psychological_factors.index')
        ->with('success', 'Psychological Factors updated successfully.');
    }

    public function destroy(PsychologicalFactor $psychologicalFactor)
    {
        $psychologicalFactor->delete();

        return redirect()->route('psychological_factors.index')
        ->with('success', 'Psychological Factors deleted successfully.');
    }
}
