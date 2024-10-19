<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\MedicalHistory;

class MedicalHistoryFactory extends Factory
{
    protected $model = MedicalHistory::class;

    public function definition()
    {
        return [
            'patient_id' => \App\Models\Patient::factory(),
            'condition' => $this->faker->word,
            'treatment' => $this->faker->sentence,
            'diagnosis_date' => $this->faker->date,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
