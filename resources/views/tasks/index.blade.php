@extends('layouts.app')

@section('title', 'Tasks')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <br/><a href="{{ route('tasks.create') }}" class="btn btn-primary">Add New Task</a>
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
                        <h5 class="card-title">List of Tasks</h5>
                        <form method="GET" action="{{ route('tasks.index') }}" class="form-inline">
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
                                        <th scope="col" width="40%">Description</th>
                                        <th scope="col" width="15%">Status</th>
                                        <th scope="col" width="15%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                    <tr>
                                        <td>{{ $task->id }}</td>
                                        <td>{{ $task->patient->fullname }} </td>
                                        <td>{{ $task->description }}</td>
                                        <td>{{ $task->status }}</td>
                                        <td>
                                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this task?')"><i class="bi bi-trash-fill"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination links -->
                        <div class="d-flex justify-content-center mt-4">
                            {{ $tasks->appends(['search' => request('search')])->links('pagination::bootstrap-4') }}
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
    /* Custom CSS for Tasks Table */
    .table-responsive {
        margin-top: 20px;
    }

    .btn i {
        margin-right: 5px;
    }
</style>
@endsection
