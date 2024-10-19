<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClinicalNote;
use App\Models\Patient;

class ClinicalNoteController extends Controller
{
    public function index(Request $request)
    {
        $query = ClinicalNote::with('patient');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->whereHas('patient', function ($q) use ($search) {
                $q->where('first_name', 'like', '%' . $search . '%')
                  ->orWhere('last_name', 'like', '%' . $search . '%');
            })->orWhere('symptoms', 'like', '%' . $search . '%')
              ->orWhere('treatment_plan', 'like', '%' . $search . '%');
        }

        $clinicalNotes = $query->paginate(10);
        return view('clinical_notes.index', compact('clinicalNotes'));
    }

    public function create()
    {
        $patients = Patient::all(); 
        return view('clinical_notes.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'visit_date' => 'required|date',
            'symptoms' => 'required',
            'treatment_plan' => 'required',
        ]);

        ClinicalNote::create($request->all());

        return redirect()->route('clinical_notes.index')
        ->with('success', 'Clinical note created successfully.');
    }

    public function edit(ClinicalNote $clinicalNote)
    {
        return view('clinical_notes.edit', compact('clinicalNote'));
    }

    public function update(Request $request, ClinicalNote $clinicalNote)
    {
        $request->validate([
            'visit_date' => 'required|date',
            'symptoms' => 'required',
            'treatment_plan' => 'required',
        ]);

        $clinicalNote->update($request->all());

        return redirect()->route('clinical_notes.index')
        ->with('success', 'Clinical note updated successfully.');
    }

    public function destroy(ClinicalNote $clinicalNote)
    {
        $clinicalNote->delete();

        return redirect()->route('clinical_notes.index')
        ->with('success', 'Clinical note deleted successfully.');
    }
}
