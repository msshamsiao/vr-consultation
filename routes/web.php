<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\ClinicalNoteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MedicalHistoryController;
use App\Http\Controllers\LabResultController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\XrayController;

Route::get('/', function () {
    return view('welcome'); // Example homepage or landing page view
});

Route::resource('patients', PatientController::class);
Route::resource('clinical_notes', ClinicalNoteController::class);
Route::resource('lab_results', LabResultController::class);
Route::resource('appointments', AppointmentsController::class);
Route::resource('tasks', TaskController::class);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::post('/x-rays/upload/{patientId}', [XrayController::class, 'upload'])->name('xrays.upload');
Route::get('/xrays/create/{patientId}', [XrayController::class, 'create'])->name('xrays.create');
Route::get('/x-rays', [XrayController::class, 'index'])->name('xrays.index');
Route::get('/x-rays/{id}', [XrayController::class, 'show'])->name('xrays.show');
Route::get('/x-rays/vr/{id}', [XrayController::class, 'vr'])->name('xrays.vr');

