<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ClinicalNote;

class ClinicalNoteFactory extends Factory
{
    protected $model = ClinicalNote::class;

    public function definition()
    {
        return [
            'patient_id' => \App\Models\Patient::factory(),
            'visit_date' => $this->faker->date,
            'symptoms' => $this->faker->paragraph,
            'treatment_plan' => $this->faker->paragraph,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
