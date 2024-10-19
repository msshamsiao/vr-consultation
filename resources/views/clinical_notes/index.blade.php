@extends('layouts.app')

@section('title', 'Clinical Notes')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <br/><a href="{{ route('clinical_notes.create') }}" class="btn btn-primary">Add New Clinical Note</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">List of Clinical Notes</h5>
                        <form method="GET" action="{{ route('clinical_notes.index') }}" class="form-inline">
                            <div class="row">
                                <div class="col-md-8">
                                    <input type="text" name="search" class="form-control mr-sm-2" placeholder="Search..." value="{{ request('search') }}">
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-outline-primary my-2 my-sm-0">Search</button>
                                </div>
                            </div>
                        </form><br/>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="bg-light">
                                        <th scope="col" width="5%">#</th>
                                        <th scope="col" width="10%">Patient</th>
                                        <th scope="col" width="10%">Visit Date</th>
                                        <th scope="col" width="20%">Symptoms</th>
                                        <th scope="col" width="20%">Treatment Plan</th>
                                        <th scope="col" width="5%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clinicalNotes as $note)
                                    <tr>
                                        <td>{{ $note->id }}</td>
                                        <td>{{ $note->patient->fullname }}</td>
                                        <td>{{ $note->visit_date->format('M d, Y') }}</td>
                                        <td>{{ $note->symptoms }}</td>
                                        <td>{{ $note->treatment_plan }}</td>
                                        <td>
                                            <a href="{{ route('clinical_notes.edit', $note->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                                            <form action="{{ route('clinical_notes.destroy', $note->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure you want to delete this Lab Results?')" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination links -->
                        <div class="d-flex justify-content-center mt-4">
                            {{ $clinicalNotes->appends(['search' => request('search')])->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('styles')
<style>
    /* Custom CSS for Clinical Notes Table */
    .table-responsive {
        margin-top: 20px;
    }

    .btn i {
        margin-right: 5px;
    }
</style>
@endsection
