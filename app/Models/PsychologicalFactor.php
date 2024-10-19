<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PsychologicalFactor extends Model
{
    use HasFactory;

    protected $table = "psychological_factors";

    protected $fillable = [
        'patient_id',
        'stresstors',
        'emotional_challenges',
        'mental_health_issues',
        'impact_on_physical_health'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
