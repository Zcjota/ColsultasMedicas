<?php

// database/seeders/RolusuariosTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rolusuario;

class RolusuariosTableSeeder extends Seeder
{
    public function run()
    {
        Rolusuario::factory()->count(10)->create();
    }
}
