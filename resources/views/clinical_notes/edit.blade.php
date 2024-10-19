@extends('layouts.app')

@section('title', 'Edit Clinical Note')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <br/><a href="{{ route('clinical_notes.index') }}" class="btn btn-secondary">Back to Clinical Notes</a>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Edit Clinical Note</div>
                        <form method="POST" action="{{ route('clinical_notes.update', $clinicalNote->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="patient_id" class="form-label">Patient Name: {{ $clinicalNote->patient->fullname }}</label>
                            </div>
                            <div class="mb-3">
                                <label for="visit_date" class="form-label">Visit Date</label>
                                <input type="date" class="form-control" id="visit_date" name="visit_date" value="{{ $clinicalNote->visit_date->format('Y-m-d') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="symptoms" class="form-label">Symptoms</label>
                                <textarea class="form-control" id="symptoms" name="symptoms" rows="5" required>{{ $clinicalNote->symptoms }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="treatment_plan" class="form-label">Treatment Plan</label>
                                <textarea class="form-control" id="treatment_plan" name="treatment_plan" rows="5" required>{{ $clinicalNote->treatment_plan }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Clinical Note</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
