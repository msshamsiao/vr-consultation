@extends('layouts.app')

@section('title', 'Edit Lab Result')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <br/><a href="{{ route('lab_results.index') }}" class="btn btn-secondary">Back</a>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Edit Lab Results</div>
                        <form action="{{ route('lab_results.update', $labResult->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="patient_id" class="form-label">Patient Name: {{ $labResult->patient->fullname }}</label>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Test Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $labResult->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="result" class="form-label">Result</label>
                                <textarea class="form-control" id="result" name="result" rows="3">{{ $labResult->result }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Date</label>
                                <input type="date" class="form-control" id="date" name="date" value="{{ $labResult->date->format('Y-m-d') }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
