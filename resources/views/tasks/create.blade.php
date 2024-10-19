@extends('layouts.app')

@section('title', 'Add Task')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <br/><a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back to Tasks</a>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">New Task</div>
                        <form method="POST" action="{{ route('tasks.store') }}">
                            @csrf
    
                            <div class="mb-3">
                                <label for="patient_id" class="form-label">Patient</label>
                                <select class="form-select form-control" id="patient_id" name="patient_id" required>
                                    @foreach ($patients as $patient)
                                        <option value="{{ $patient->id }}">{{ $patient->first_name }} {{ $patient->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>
    
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
                            </div>
    
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select form-control" id="status" name="status" required>
                                    <option value="pending">Pending</option>
                                    <option value="completed">Completed</option>
                                </select>
                            </div>
    
                            <button type="submit" class="btn btn-primary">Save Task</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
