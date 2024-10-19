@extends('layouts.app')

@section('title', 'Patients List')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <br/><a href="{{ route('patients.create') }}" class="btn btn-primary">Add New Patient</a>
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
                        <h5 class="card-title">List of Patient Informations</h5>
                        <form method="GET" action="{{ route('patients.index') }}" class="form-inline">
                            <div class="row">
                                <div class="col-md-8">
                                    <input type="text" name="search" class="form-control mr-sm-2" placeholder="Search..." value="{{ request('search') }}">
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-outline-primary my-2 my-sm-0">Search</button>
                                </div>
                            </div>
                        </form>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr class="bg-light">
                                        <th scope="col" width="5%">#</th>
                                        <th scope="col" width="15%">Fullname</th>
                                        <th scope="col" width="20%">Date of Birth</th>
                                        <th scope="col" width="5%">Gender</th>
                                        <th scope="col" width="5%">Email</th>
                                        <th scope="col" width="15%">Phone</th>
                                        <th scope="col" class="text-end" width="30%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($patients as $patient)
                                    <tr>
                                        <td>{{ $patient->id }}</td>
                                        <td>{{ $patient->fullname }}</td>
                                        <td>{{ $patient->date_of_birth->format('M d, Y') }}</td>
                                        <td>{{ ucfirst($patient->gender) }}</td>
                                        <td>{{ $patient->email }}</td>
                                        <td>{{ $patient->phone }}</td>
                                        <td class="text-end">
                                            <a href="{{ route('xrays.create', ['patientId' => $patient->id]) }}" class="btn btn-primary btn-sm"><i class="bi bi-upload"></i></a>
                                            <a href="{{ route('patients.edit', $patient->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                                            <a href="{{ route('patients.show', $patient->id) }}" class="btn btn-info btn-sm"><i class="bi bi-eye-fill"></i></a>
                                            <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure you want to delete this Patient Information?')" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination links -->
                        <div class="d-flex justify-content-center mt-4">
                            {{ $patients->appends(['search' => request('search')])->links('pagination::bootstrap-4') }}
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
    /* Custom CSS for Patient Table */
    .table-responsive {
        margin-top: 20px;
    }

    .btn i {
        margin-right: 5px;
    }
</style>
@endsection
