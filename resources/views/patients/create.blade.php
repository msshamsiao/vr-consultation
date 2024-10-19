@extends('layouts.app')

@section('title', 'Add New Patient')

@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <br/><a href="{{ route('patients.index') }}" class="btn btn-secondary">Back to Patients List</a>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
       </div>
    @endif
    <form action="{{ route('patients.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">General Patient Information</h5>
                <div class="accordion" id="accordionExample">
                    
                    <!-- General Patient Information Card -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="patientInformation">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePatientInfo" aria-expanded="true" aria-controls="collapsePatientInfo">
                              Patient Information
                            </button>
                        </h2>
                        <div id="collapsePatientInfo" class="accordion-collapse collapse show" aria-labelledby="patientInformation" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="first_name">First Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="first_name" name="first_name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="last_name">Last Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="last_name" name="last_name" required>
                                        </div>
                                    </div>
                                </div><br/>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date_of_birth">Date of Birth <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gender">Gender <span class="text-danger">*</span></label>
                                            <select class="form-control" id="gender" name="gender" required>
                                                <option value="" disabled selected>Choose Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                </div><br/>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email <span class="text-info">(Optional)</span></label>
                                            <input type="email" class="form-control" id="email" name="email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">Phone <span class="text-info">(Optional)</span></label>
                                            <input type="text" class="form-control" id="phone" name="phone">
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <fieldset>
                                    Address <span class="text-info">(Optional)</span>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="street">Street</label>
                                                <input type="text" class="form-control" id="street" name="street">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="city">City</label>
                                                <input type="text" class="form-control" id="city" name="city">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="state">State</label>
                                                <input type="text" class="form-control" id="state" name="state">
                                            </div>
                                        </div>
                                    </div><br/>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="country">Country</label>
                                                <input type="text" class="form-control" id="country" name="country">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="zip_code">Zip Code</label>
                                                <input type="text" class="form-control" id="zip_code" name="zip_code">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>

                    <!-- Patient's Medical History Card -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="medicalHistory">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMedicalHistory" aria-expanded="true" aria-controls="collapseMedicalHistory">
                              Medical History
                            </button>
                        </h2>
                        <div id="collapseMedicalHistory" class="accordion-collapse collapse" aria-labelledby="medicalHistory" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="mb-3">
                                    <label for="condition" class="form-label">Condition <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="condition" name="condition"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="treatment" class="form-label">Treatment <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="treatment" name="treatment"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="diagnosis_date" class="form-label">Diagnosis Date <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" id="diagnosis_date" name="diagnosis_date" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="illness" class="form-label">Illness: Have you ever had (Please check all that apply) <span class="text-danger">*</span></label>
                                            <select class="form-control" id="illness" name="illness[]" multiple="multiple">
                                                @foreach ([
                                                    'Anemia', 'Asthma', 'Arthritis', 'Cancer', 'Gout', 'Diabetes', 'Emotional Disorder',
                                                    'Epilepsy Seizures', 'Fainting Spells', 'Gallstones', 'Heart Disease', 'Heart Attack',
                                                    'Rheumatic Fever', 'High Blood Pressure', 'Digestive Problems', 'Ulcerative Colitis',
                                                    'Ulcer Disease', 'Hepatitis', 'Kidney Disease', 'Liver Disease', 'Sleep Apnea',
                                                    'Use a C-PAP machine', 'Thyroid Problems', 'Tuberculosis', 'Venereal Disease',
                                                    'Neurological Disorders', 'Bleeding Disorders', 'Lung Disease', 'Emphysema'
                                                ] as $condition)
                                                    <option value="{{ $condition }}">
                                                        {{ $condition }}
                                                    </option>
                                                @endforeach
                                            </select>  
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="surgeries" class="form-label">Surgeries <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="surgeries" name="surgeries"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="allergies" class="form-label">List all the Allergies <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="allergies" name="allergies"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Family Medical History Card -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="familyHistory">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFamilyHistory" aria-expanded="true" aria-controls="collapseFamilyHistory">
                                Family Medical History
                            </button>
                        </h2>
                        <div id="collapseFamilyHistory" class="accordion-collapse collapse" aria-labelledby="familyHistory" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="family_history_heart_disease_father" name="family_history_heart_disease_father">
                                    <label class="form-check-label" for="family_history_heart_disease_father">Heart Disease (Father)</label>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="family_history_heart_disease_mother" name="family_history_heart_disease_mother">
                                    <label class="form-check-label" for="family_history_heart_disease_mother">Heart Disease (Mother)</label>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="family_history_diabetes_father" name="family_history_diabetes_father">
                                    <label class="form-check-label" for="family_history_diabetes_father">Diabetes (Father)</label>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="family_history_diabetes_mother" name="family_history_diabetes_mother">
                                    <label class="form-check-label" for="family_history_diabetes_mother">Diabetes (Mother)</label>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="family_history_cancer_father" name="family_history_cancer_father">
                                    <label class="form-check-label" for="family_history_cancer_father">Cancer (Father)</label>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="family_history_cancer_mother" name="family_history_cancer_mother">
                                    <label class="form-check-label" for="family_history_cancer_mother">Cancer (Mother)</label>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="family_history_hypertension_father" name="family_history_hypertension_father">
                                    <label class="form-check-label" for="family_history_hypertension_father">Hypertension (Father)</label>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="family_history_hypertension_mother" name="family_history_hypertension_mother">
                                    <label class="form-check-label" for="family_history_hypertension_mother">Hypertension (Mother)</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Current Symptoms Card -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="currentSymptoms">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCurrentSymptoms" aria-expanded="true" aria-controls="collapseCurrentSymptoms">
                                Current Symptoms History
                            </button>
                        </h2>
                        <div id="collapseCurrentSymptoms" class="accordion-collapse collapse" aria-labelledby="currentSymptoms" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="mb-3">
                                    <label for="symptoms" class="form-label">Symptoms <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="symptoms" name="symptoms"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="duration" class="form-label">Duration <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="duration" name="duration">
                                </div>
                                <div class="mb-3">
                                    <label for="severity" class="form-label">Severity <span class="text-danger">*</span></label>
                                    <select class="form-control" id="severity" name="severity">
                                        <option value="" disabled selected>Choose Severity</option>
                                        <option value="mild">Mild</option>
                                        <option value="moderate">Moderate</option>
                                        <option value="severe">Severe</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="alleviating_factors" class="form-label">Alleviating Factors <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="alleviating_factors" name="alleviating_factors">
                                </div>
                                <div class="mb-3">
                                    <label for="worsening_factors" class="form-label">Worsening Factors <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="worsening_factors" name="worsening_factors">
                                </div>
                                <div class="mb-3">
                                    <label for="onset_date" class="form-label">Onset Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="onset_date" name="onset_date">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Medication History Card -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="medicationHistory">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMedicationHistory" aria-expanded="true" aria-controls="collapseMedicationHistory">
                                Medication History
                            </button>
                        </h2>
                        <div id="collapseMedicationHistory" class="accordion-collapse collapse" aria-labelledby="medicationHistory" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="mb-3">
                                    <label for="medication_name" class="form-label">Medication Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="medication_name" name="medication_name">
                                </div>
                                <div class="mb-3">
                                    <label for="dosage" class="form-label">Dosage <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="dosage" name="dosage">
                                </div>
                                <div class="mb-3">
                                    <label for="frequency" class="form-label">Frequency <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="frequency" name="frequency">
                                </div>
                                <div class="mb-3">
                                    <label for="start_on" class="form-label">Start On <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="start_on" name="start_on">
                                </div>
                                <div class="mb-3">
                                    <label for="stopped_on" class="form-label">Stopped On <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="stopped_on" name="stopped_on">
                                </div>
                                <div class="mb-3">
                                    <label for="notes" class="form-label">Notes <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="noted" name="notes"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Social History Card -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="socialHistory">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSocialHistory" aria-expanded="true" aria-controls="collapseSocialHistory">
                                Social History
                            </button>
                        </h2>
                        <div id="collapseSocialHistory" class="accordion-collapse collapse" aria-labelledby="socialHistory" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="mb-3">
                                    <label for="smoking_status" class="form-label">Smoking Status <span class="text-danger">*</span></label>
                                    <select class="form-control" id="smoking_status" name="smoking_status">
                                        <option value="" disabled selected>Choose Smoking Status</option>
                                        <option value="never">Never</option>
                                        <option value="former">Former</option>
                                        <option value="current">Current</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="dosage" class="form-label">Alchohol Consumption <span class="text-danger">*</span></label>
                                    <select class="form-control" id="alcohol_consumption" name="alcohol_consumption">
                                        <option value="" disabled selected>Choose Alchohol Consumption</option>
                                        <option value="never">None</option>
                                        <option value="social">Social</option>
                                        <option value="moderate">Moderate</option>
                                        <option value="heavy">Heavy</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exercise_routine" class="form-label">Exercise Routine <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="exercise_routine" name="exercise_routine"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="diet_preferences" class="form-label">Diet Preferences <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="diet_preferences" name="diet_preferences"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
            
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('styles')
<style>
    .form-group {
        margin-bottom: 1rem;
    }

    .form-control {
        width: 100%;
    }

    .btn-primary {
        margin-top: 1rem;
    }
</style>
@endsection
