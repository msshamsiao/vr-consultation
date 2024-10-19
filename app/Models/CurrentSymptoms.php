<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrentSymptoms extends Model
{
    use HasFactory;

    protected $table = "current_sysmptoms";

    protected $fillable = [
        'patient_id',
        'symptoms', 
        'duration', 
        'severity',
        'alleviating_factors',
        'worsening_factors',
        'onset_date'
    ];

    protected $casts = [
        'onset_date' => 'date',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
