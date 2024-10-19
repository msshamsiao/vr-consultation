<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClinicalNotesTableSeeder extends Seeder
{
    public function run()
    {
        \App\Models\ClinicalNote::factory(100)->create();
    }
}
