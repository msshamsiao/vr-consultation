<!-- resources/views/xrays/create.blade.php -->

@extends('layouts.app')

@section('title', 'Upload X-ray')

@section('content')
    <div class="container">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Upload X-ray</h2>
                            <form action="{{ route('xrays.upload', ['patientId' => $patient->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="xray_file">Select X-ray Image:</label>
                                    <input type="file" class="form-control-file" id="xray_file" name="xray_file">
                                </div>
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
