<?php

namespace App\Http\Controllers;
use App\Models\Patient;
use App\Models\Xray;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class XrayController extends Controller
{
    protected $sketchfabService;

    public function index()
    {
        $xrays = Xray::all();
        return view('x-rays.index', compact('xrays'));
    }

    public function create($patientId)
    {
        $patient = Patient::findOrFail($patientId);
        return view('x-rays.create', compact('patient'));
    }

    public function upload(Request $request, $patientId)
    {
        $request->validate([
            'xray_file' => 'required|file|mimes:jpeg,png|max:2048',
        ]);

        try {
            // Retrieve the patient by ID
            $patient = Patient::findOrFail($patientId);

            // Handle the uploaded file
            $file = $request->file('xray_file');
            $filename = $file->getClientOriginalName();
            $filePath = $file->storeAs('xrays', $filename, 'public');

            // Save the X-ray record in the database
            $xray = new Xray();
            $xray->patient_id = $patient->id;
            $xray->filename = $filename;
            $xray->filepath = '/storage/' . $filePath;
            $xray->save();

            // Redirect back with a success message
            return redirect()
                ->route('patients.index', $patient->id)
                ->with('success', 'X-ray uploaded successfully.');

        } catch (\Exception $e) {
            // Handle any errors
            return back()->withErrors([
                'error' => 'An error occurred while uploading the X-ray: ' . $e->getMessage()
            ]);
        }
    }

    public function view(Request $request)
    {
        $xray_image_url = $request->query('xray_image_url');
        return view('x-ray.view', compact('xray_image_url'));
    }

    public function show($id)
    {
        $xray = Xray::findOrFail($id); 
        $xray_image_url = Storage::url($xray->filepath); 

        return view('x-ray.view', compact('xray_image_url'));
    }

    public function vr($id)
    {
        $xray = Xray::findOrFail($id);
        return view('x-rays.vr', compact('xray'));
    }

    public function showVR($id)
    {
        $xray = Xray::findOrFail($id); 
        $xray_image_url = Storage::url($xray->filepath);

        return view('vr', compact('xray_image_url'));
    }
}