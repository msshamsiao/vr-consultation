<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\LabResult;

class LabResultFactory extends Factory
{
    protected $model = LabResult::class;

    public function definition()
    {
        return [
            'patient_id' => \App\Models\Patient::factory(),
            'name' => $this->faker->word,
            'result' => $this->faker->word,
            'date' => $this->faker->date,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
