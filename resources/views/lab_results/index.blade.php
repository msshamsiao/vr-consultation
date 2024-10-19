@extends('layouts.app')

@section('title', 'Lab Results')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <br/><a href="{{ route('lab_results.create') }}" class="btn btn-primary">Add New Lab Result</a>
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
                        <h5 class="card-title">List of Lab Results</h5>
                        <form method="GET" action="{{ route('lab_results.index') }}" class="form-inline">
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
                                        <th scope="col" width="20%">Patient</th>
                                        <th scope="col" width="20%">Test Result's Name</th>
                                        <th scope="col" width="20%">Result</th>
                                        <th scope="col" width="20%">Date</th>
                                        <th scope="col" width="15%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($labResults as $result)
                                    <tr>
                                        <td>{{ $result->id }}</td>
                                        <td>{{ $result->patient->first_name }} {{ $result->patient->last_name }}</td>
                                        <td>{{ $result->name }}</td>
                                        <td>{{ $result->result }}</td>
                                        <td>{{ $result->date->format('M d, Y') }}</td>
                                        <td>
                                            <a href="{{ route('lab_results.edit', $result->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                                            <form action="{{ route('lab_results.destroy', $result->id) }}" method="POST" class="d-inline">
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
                            {{ $labResults->appends(['search' => request('search')])->links('pagination::bootstrap-4') }}
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
    /* Custom CSS for Lab Results Table */
    .table-responsive {
        margin-top: 20px;
    }

    .btn i {
        margin-right: 5px;
    }
</style>
@endsection
