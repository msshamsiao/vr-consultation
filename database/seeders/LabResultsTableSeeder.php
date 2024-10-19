<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LabResultsTableSeeder extends Seeder
{
    public function run()
    {
        \App\Models\LabResult::factory(100)->create();
    }
}
