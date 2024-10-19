<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LabResult;
use App\Models\Patient;
use Illuminate\Support\Facades\Log;

class LabResultController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $labResults = LabResult::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                    ->orWhere('result', 'like', "%{$search}%")
                    ->orWhereHas('patient', function ($q) use ($search) {
                        $q->where('first_name', 'like', "%{$search}%")
                        ->orWhere('last_name', 'like', "%{$search}%");
                    });
            })
            ->paginate(10);

        return view('lab_results.index', compact('labResults'));
    }

    public function create()
    {
        $patients = Patient::all(); 
        return view('lab_results.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'result' => 'required',
            'date' => 'required|date',
        ]);

        try {
            LabResult::create($request->all());
            
            Log::info('Lab result created successfully.', ['request' => $request->all()]);
            return redirect()->route('lab_results.index')->with('success', 'Lab result created successfully.');
            
        } catch (\Exception $e) {
            Log::error('Failed to create lab result.', ['exception' => $e]);
            return back()->withErrors(['error' => 'Failed to create lab result. ' . $e->getMessage()]);
        }
    }

    public function edit(LabResult $labResult)
    {
        return view('lab_results.edit', compact('labResult'));
    }

    public function update(Request $request, LabResult $labResult)
    {
        $request->validate([
            'name' => 'required',
            'result' => 'required',
            'date' => 'required|date',
        ]);

        $labResult->update($request->all());

        return redirect()->route('lab_results.index')
        ->with('success', 'Lab result updated successfully.');
    }

    public function destroy(LabResult $labResult)
    {
        $labResult->delete();

        return redirect()->route('lab_results.index')
        ->with('success', 'Lab result deleted successfully.');
    }
}
