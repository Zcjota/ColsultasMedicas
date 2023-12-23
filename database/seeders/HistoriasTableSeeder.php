<?php

// database/seeders/HistoriasTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Historia;

class HistoriasTableSeeder extends Seeder
{
    public function run()
    {
        Historia::factory()->count(10)->create();
    }
}
