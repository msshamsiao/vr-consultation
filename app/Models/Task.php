<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = "tasks";

    protected $fillable = [
        'patient_id',
        'description',
        'status',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
