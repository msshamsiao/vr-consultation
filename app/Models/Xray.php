<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Xray extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id', 'filename', 'filepath',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
