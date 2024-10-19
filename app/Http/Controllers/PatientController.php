<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Patient;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $patients = Patient::query()
            ->when($search, function ($query, $search) {
                return $query->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");
            })
            ->paginate(10);

        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female',
            'email' => 'required|email|unique:patients,email',
            'phone' => 'required',
            
            'condition' => 'required',
            'treatment' => 'nullable',
            'diagnosis_date' => 'required|date',
            'illness' => 'required',
            'surgeries' => 'required',
            'allergies' => 'required',
        ]);
    
        // Begin database transaction
        DB::beginTransaction();
    
        try {
            $patient = Patient::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'date_of_birth' => $request->input('date_of_birth'),
                'gender' => $request->input('gender'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),

                'address' => $request->input('address'),
                'city' => $request->input('city'),
                'state' => $request->input('state'),
                'country' => $request->input('country'),
                'zip_code' => $request->input('zip_code'),
            ]);
    
            $patient->medicalHistory()->create([
                'patient_id' => $patient->id,
                'condition' => $request->input('condition'),
                'treatment' => $request->input('treatment'),
                'diagnosis_date' => $request->input('diagnosis_date'),
                'illness' => $request->input('illness'),
                'surgeries' => $request->input('surgeries'),
                'allergies' => $request->input('allergies'),
            ]);

            $patient->familyHistory()->create([
                'patient_id' => $patient->id,
                'is_heart_disease_father' => $request->has('family_history_heart_disease_father'),
                'is_heart_disease_mother' => $request->has('family_history_heart_disease_mother'),
                'is_diabetes_father' => $request->has('family_history_diabetes_father'),
                'is_diabetes_mother' => $request->has('family_history_diabetes_mother'),
                'is_cancer_father' => $request->has('family_history_cancer_father'),
                'is_cancer_mother' => $request->has('family_history_cancer_mother'),
                'is_hypertension_father' => $request->has('family_history_hypertension_father'),
                'is_hypertension_mother' => $request->has('family_history_hypertension_mother'),
            ]);

            $patient->currentSymptoms()->create([
                'patient_id' => $patient->id,
                'symptoms' => $request->input('symptoms'),
                'duration' => $request->input('duration'),
                'severity' => $request->input('severity'),
                'alleviating_factors' => $request->input('alleviating_factors'),
                'worsening_factors' => $request->input('worsening_factors'),
                'onset_date' => $request->input('onset_date'),
            ]);

            $patient->medicationHistory()->create([
                'patient_id' => $patient->id,
                'medication_name' => $request->input('medication_name'),
                'dosage' => $request->input('dosage'),
                'frequency' => $request->input('frequency'),
                'start_on' => $request->input('start_on'),
                'stopped_on' => $request->input('stopped_on'),
                'notes' => $request->input('notes'),
            ]);

            $patient->socialHistory()->create([
                'patient_id' => $patient->id,
                'smoking_status' => $request->input('smoking_status'),
                'alcohol_consumption' => $request->input('alcohol_consumption'),
                'exercise_routine' => $request->input('exercise_routine'),
                'diet_preferences' => $request->input('diet_preferences')
            ]);
    
            DB::commit();
    
            return redirect()->route('patients.index')->with('success', 'Patient information added successfully.');
    
        } catch (\Exception $e) {
            DB::rollback();

            Log::error('Failed to add Patient' . $e);
    
            return back()->withInput()->withErrors(['error' => 'Failed to add patient. Please try again.']);
        }
    }    

    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        $medicalHistory = $patient->medicalHistory()->firstOrNew();
        $familyHistory = $patient->familyHistory()->firstOrNew();
        $currentSymptom = $patient->currentSymptoms()->firstOrNew();
        return view('patients.show', compact('patient', 'medicalHistory', 'familyHistory'));
    }

    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        $medicalHistory = $patient->medicalHistory()->firstOrNew();
        $familyHistory = $patient->familyHistory()->firstOrNew();
        $currentSymptom = $patient->currentSymptoms()->firstOrNew();
        $medicationHistory = $patient->medicationHistory()->firstOrNew();
        $socialHistory = $patient->socialHistory()->firstOrNew();
        return view('patients.edit', compact(
            'patient', 
            'medicalHistory', 
            'familyHistory', 
            'currentSymptom', 
            'medicationHistory',
            'socialHistory'
        ));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required|date',
            'gender' => 'required|in:male,female',
            'email' => 'required|email|unique:patients,email,' . $id,
            'phone' => 'required',
            'condition' => 'required',
            'treatment' => 'nullable',
            'diagnosis_date' => 'required|date',
            'illness' => 'required|array',
        ]);

        // Begin database transaction
        DB::beginTransaction();

        try {
            // Find the patient
            $patient = Patient::findOrFail($id);

            // Update general patient information
            $patient->update([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'date_of_birth' => $request->input('date_of_birth'),
                'gender' => $request->input('gender'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),

                'address' => $request->input('address'),
                'city' => $request->input('city'),
                'state' => $request->input('state'),
                'country' => $request->input('country'),
                'zip_code' => $request->input('zip_code'),
            ]);

            // Update patient's medical history
            $medicalHistory = $patient->medicalHistory()->firstOrCreate(['patient_id' => $patient->id]);
            $medicalHistory->update([
                'condition' => $request->input('condition'),
                'treatment' => $request->input('treatment'),
                'diagnosis_date' => $request->input('diagnosis_date'),
                'illness' => $request->input('illness'),
            ]);

            // Update patient's family medical history
            $familyHistory = $patient->familyHistory()->firstOrCreate(['patient_id' => $patient->id]);
            $familyHistory->update([
                'is_heart_disease_father' => $request->has('family_history_heart_disease_father'),
                'is_heart_disease_mother' => $request->has('family_history_heart_disease_mother'),
                'is_diabetes_father' => $request->has('family_history_diabetes_father'),
                'is_diabetes_mother' => $request->has('family_history_diabetes_mother'),
                'is_cancer_father' => $request->has('family_history_cancer_father'),
                'is_cancer_mother' => $request->has('family_history_cancer_mother'),
                'is_hypertension_father' => $request->has('family_history_hypertension_father'),
                'is_hypertension_mother' => $request->has('family_history_hypertension_mother'),
            ]);

            // Update patient's current symptoms
            $currentSymptom = $patient->currentSymptoms()->firstOrCreate(['patient_id' => $patient->id]);
            $currentSymptom->update([
                'symptoms' => $request->input('symptoms'),
                'duration' => $request->input('duration'),
                'severity' => $request->input('severity'),
                'alleviating_factors' => $request->input('alleviating_factors'),
                'worsening_factors' => $request->input('worsening_factors'),
                'onset_date' => $request->input('onset_date'),
            ]);

            // Update patient's medication history
            $medicationHistory = $patient->medicationHistory()->firstOrCreate(['patient_id' => $patient->id]);
            $medicationHistory->update([
                'medication_name' => $request->input('medication_name'),
                'dosage' => $request->input('dosage'),
                'frequency' => $request->input('frequency'),
                'start_on' => $request->input('start_on'),
                'stopped_on' => $request->input('stopped_on'),
                'notes' => $request->input('notes'),
            ]);

            // Update patient's social history
            $socialHistory = $patient->socialHistory()->firstOrCreate(['patient_id' => $patient->id]);
            $socialHistory->update([
                'smoking_status' => $request->input('smoking_status'),
                'alcohol_consumption' => $request->input('alcohol_consumption'),
                'exercise_routine' => $request->input('exercise_routine'),
                'diet_preferences' => $request->input('diet_preferences')
            ]);

            DB::commit();

            return redirect()->route('patients.index')->with('success', 'Patient updated successfully.');
        } catch (\Exception $e) {
            DB::rollback();

            Log::error('Failed to update Patient' . $e);

            return back()->withInput()->withErrors(['error' => 'Failed to update patient. Please try again.']);
        }
    }

    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return redirect()->route('patients.index')
        ->with('success', 'Patient deleted successfully.');
    }

}
