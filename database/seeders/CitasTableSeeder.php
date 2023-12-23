<?php
// database/seeders/CitasTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Citas;
use Database\Factories\CitaFactory;


class CitasTableSeeder extends Seeder
{
    public function run()
    {
        CitaFactory::new()->count(10)->create();

    }
}
