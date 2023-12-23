<?php

// database/factories/RecetarioFactory.php

namespace Database\Factories;

use App\Models\Recetario;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecetarioFactory extends Factory
{
    protected $model = Recetario::class;

    public function definition()
    {
        return [
            'historia_id' => \App\Models\Historia::factory(),
            'last_used_at' => null,
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ];
    }
}
