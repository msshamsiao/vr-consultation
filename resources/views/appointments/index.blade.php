@extends('layouts.app')

@section('title', 'Appointments')

@section('content')

    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid/main.css" rel="stylesheet" />

    <div class="container">
        <h2>Appointments</h2>
        <a href="{{ route('appointments.create') }}" class="btn btn-success mb-3">Create New Appointment</a>

        <br/>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div id="calendar"></div>
    </div>

    @php
        use Carbon\Carbon;

        $events = \App\Models\Appointment::all()->map(function($appointment) {
            return [
                'title' => $appointment->title,
                'start' => Carbon::parse($appointment->start)->format('Y-m-d H:i:s'),
                'end' => Carbon::parse($appointment->end)->format('Y-m-d H:i:s'),
                'description' => $appointment->description,
                'url' => route('appointments.edit', $appointment->id),
            ];
        });
    @endphp

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridWeek',
                slotMinTime: '08:00:00',
                slotMaxTime: '19:00:00',
                events: @json($events),
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'timeGridWeek,timeGridDay'
                },
            });
            calendar.render();
        });
    </script>
@endsection
