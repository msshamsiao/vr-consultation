<!-- resources/views/xrays/index.blade.php -->

@extends('layouts.app')

@section('title', 'X-rays')

@section('content')
    <div class="container">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="card-title">X-rays</h1>
                            @if ($xrays->isEmpty())
                                <p>No X-rays found.</p>
                            @else
                                <ul class="list-group">
                                    @foreach ($xrays as $xray)
                                        <li class="list-group-item">
                                            <h3 class="card-title">{{ $xray->filename }}</h3>
                                            <p>Uploaded on: {{ $xray->created_at->format('Y-m-d H:i:s') }}</p>
                                            <a href="{{ route('xrays.vr', $xray->id) }}" class="btn btn-primary">View in VR</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
