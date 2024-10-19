<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    use HasFactory;

    protected $table = "medical_histories";

    protected $fillable = [
        'patient_id',
        'condition', 
        'treatment',
        'diagnosis_date',
        'illness',
        'surgeries', 
        'allergies'
    ];

    protected $casts = [
        'diagnosis_date' => 'date',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
