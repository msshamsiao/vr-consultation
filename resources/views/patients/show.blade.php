@extends('layouts.app')

@section('title', 'Patient Details')

@section('content')

    <!-- Custom styles -->
    <style>
        /* Custom styling can be added here */
        .paper-design {
            background-color: #f8f9fa;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            margin: 20px auto;
            max-width: 1000px;
        }
        .section-title {
            font-size: 1.5rem;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .section-content {
            padding: 10px 0;
        }
    </style>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <br/><a href="{{ route('patients.index') }}" class="btn btn-secondary">Back to Patients List</a>
        </div>
        <div class="paper-design">
            <div class="section">
                <div class="section-title">Medical History</div>
                <div class="section-content">
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Condition:</strong></div>
                        <div class="col-sm-8">{{ $medicalHistory->condition }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Treatment:</strong></div>
                        <div class="col-sm-8">{{ $medicalHistory->treatment }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Diagnosis Date:</strong></div>
                        <div class="col-sm-8">{{ $medicalHistory->diagnosis_date }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Illness:</strong></div>
                        <div class="col-sm-8">{{ $medicalHistory->illness }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Surgeries:</strong></div>
                        <div class="col-sm-8">{{ $medicalHistory->surgeries }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Allergies:</strong></div>
                        <div class="col-sm-8">{{ $medicalHistory->allergies }}</div>
                    </div>
                </div>
            </div>
            <div class="section">
                <div class="section-title">Family History</div>
                <div class="section-content">
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Heart Disease (Father)e:</strong></div>
                        <div class="col-sm-8">{{ $familyHistory->is_heart_disease_father == 0 ? 'None' : 'Yes' }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Heart Disease (Mother):</strong></div>
                        <div class="col-sm-8">{{ $familyHistory->is_heart_disease_mother == 0 ? 'None' : 'Yes' }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Diabetes (Father):</strong></div>
                        <div class="col-sm-8">{{ $familyHistory->is_diabetes_father == 0 ? 'None' : 'Yes' }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Diabetes (Mother):</strong></div>
                        <div class="col-sm-8">{{ $familyHistory->is_diabetes_mother == 0 ? 'None' : 'Yes' }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Cancer (Father):</strong></div>
                        <div class="col-sm-8">{{ $familyHistory->is_cancer_father == 0 ? 'None' : 'Yes' }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Cancer (Mother):</strong></div>
                        <div class="col-sm-8">{{ $familyHistory->is_cancer_mother == 0 ? 'None' : 'Yes' }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Hypertension (Father):</strong></div>
                        <div class="col-sm-8">{{ $familyHistory->is_hypertension_father == 0 ? 'None' : 'Yes' }}</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-4"><strong>Hypertension (Mother):</strong></div>
                        <div class="col-sm-8">{{ $familyHistory->is_hypertension_mother == 0 ? 'None' : 'Yes' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies (not necessary for the design, but if you need functionality) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-mC3g3S4FjtcbwTC/R/XmE1GGOTM4tQh2sbsv9+T6h0wblxhW4DgHJcygmeId1C2j" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh/jFc/8+YFoFIcTjS0bcD50j5gF+tKPi5btD" crossorigin="anonymous"></script>
@endsection
