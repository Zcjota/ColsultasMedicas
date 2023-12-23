<?php

// database/seeders/RecetariosTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recetario;

class RecetariosTableSeeder extends Seeder
{
    public function run()
    {
        Recetario::factory()->count(10)->create();
    }
}
