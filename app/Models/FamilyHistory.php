<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyHistory extends Model
{
    use HasFactory;

    protected $table = "family_medical_histories";

    protected $fillable = [
        'patient_id',
        'is_heart_disease_father',
        'is_heart_disease_mother',
        'is_diabetes_father',
        'is_diabetes_mother',
        'is_cancer_father',
        'is_cancer_mother',
        'is_hypertension_father',
        'is_hypertension_mother'
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

}
