<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicalHistoriesTableSeeder extends Seeder
{
    public function run()
    {
        \App\Models\MedicalHistory::factory(100)->create();
    }
}
