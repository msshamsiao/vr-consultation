@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <br/><a href="{{ route('appointments.index') }}" class="btn btn-secondary">Back to Appointment</a>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">Edit Clinical Note</div>
                            <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                    
                                <div class="mb-3">
                                    <label for="patient_id" class="form-label">Patient Name: {{ $appointment->patient->fullname }}</label>
                                </div>
    
                                <div class="mb-3">
                                    <label for="start" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $appointment->title }}" required>
                                </div>
    
                                <div class="mb-3">
                                    <label for="start" class="form-label">Appointment Start</label>
                                    <input type="datetime-local" class="form-control" id="start" name="start" value="{{ $appointment->start->format('Y-m-d\TH:i') }}" required>
                                </div>
                    
                                <div class="mb-3">
                                    <label for="end" class="form-label">Appointment End</label>
                                    <input type="datetime-local" class="form-control" id="end" name="end" value="{{ $appointment->end->format('Y-m-d\TH:i') }}" required>
                                </div>
                    
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="5" required>{{ $appointment->description }}</textarea>
                                </div>
                    
                                <button type="submit" class="btn btn-primary">Update Appointment</button>
                            </form>
                            
                            <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" class="mt-3">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this appointment?')">Delete Appointment</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
