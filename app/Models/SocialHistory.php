<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialHistory extends Model
{
    use HasFactory;

    protected $table = "social_history";

    protected $fillable = [
        'patient_id',
        'smoking_status',
        'alcohol_consumption',
        'exercise_routine',
        'diet_preferences',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
