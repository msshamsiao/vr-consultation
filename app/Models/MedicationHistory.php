<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicationHistory extends Model
{
    use HasFactory;

    protected $table = "medication_history";

    protected $fillable = [
        'patient_id',
        'medication_name',
        'dosage',
        'frequency',
        'start_on',
        'stopped_on',
        'notes'
    ];

    protected $casts = [
        'start_on' => 'date',
        'stopped_on' => 'date'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
