<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = "patients";

    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'gender',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'country',
        'zip_code'
    ];

    protected $casts = [
        'date_of_birth' => 'datetime',
    ];

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function xrays()
    {
        return $this->hasMany(Xray::class);
    }

    public function medicalHistory()
    {
        return $this->hasMany(MedicalHistory::class);
    }

    public function familyHistory()
    {
        return $this->hasMany(FamilyHistory::class);
    }

    public function clinicalNotes()
    {
        return $this->hasMany(ClinicalNote::class);
    }

    public function labResults()
    {
        return $this->hasMany(LabResult::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function currentSymptoms()
    {
        return $this->hasMany(CurrentSymptoms::class);
    }

    public function medicationHistory()
    {
        return $this->hasMany(MedicationHistory::class);
    }

    public function socialHistory()
    {
        return $this->hasMany(SocialHistory::class);
    }

}
