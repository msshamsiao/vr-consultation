@extends('layouts.app')

@section('title', 'Edit Patient')

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
    <form action="{{ route('patients.update', $patient->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">General Patient Information</h5>
                <div class="accordion" id="accordionExample">
                    
                    <!-- Patient Information Card -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="patientInformation">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePatientInfo" aria-expanded="true" aria-controls="collapsePatientInfo">
                              Patient Information
                            </button>
                        </h2>
                        <div id="collapsePatientInfo" class="accordion-collapse collapse show" aria-labelledby="patientInformation" data-bs-parent="#accordionExample">
                           <div class="accordion-body">
                                @include('patients.partials.general_info_form', ['patient' => $patient])
                           </div>
                        </div>
                    </div>

                    <!-- Medical History Card -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="medicalHistory">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMedicalHistory" aria-expanded="true" aria-controls="collapseMedicalHistory">
                                Medical History
                            </button>
                        </h2>
                        <div id="collapseMedicalHistory" class="accordion-collapse collapse" aria-labelledby="medicalHistory" data-bs-parent="#accordionExample">
                           <div class="accordion-body">
                                @include('patients.partials.medical_history_form', ['medicalHistory' => $medicalHistory])
                           </div>
                        </div>
                    </div>

                    <!-- Family History Card -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="familyHistory">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFamilyHistory" aria-expanded="true" aria-controls="collapseFamilyHistory">
                                Family History
                            </button>
                        </h2>
                        <div id="collapseFamilyHistory" class="accordion-collapse collapse" aria-labelledby="familyHistory" data-bs-parent="#accordionExample">
                           <div class="accordion-body">
                                @include('patients.partials.family_history_form', ['familyHistory' => $familyHistory])
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
                                @include('patients.partials.current_symptom_form', ['currentSymptom' => $currentSymptom])
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
                                @include('patients.partials.medication_history_form', ['medicationHistory' => $medicationHistory])
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
                                @include('patients.partials.social_history_form', ['socialHistory' => $socialHistory])
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>    
</div>
@endsection
