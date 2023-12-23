<?php

// database/factories/RolusuarioFactory.php

namespace Database\Factories;

use App\Models\Rolusuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class RolusuarioFactory extends Factory
{
    protected $model = Rolusuario::class;

    public function definition()
    {
        $usuarioId = \App\Models\Usuario::factory();

        return [
            'usuario_id' => $usuarioId,
            'nombre_rol' => $this->faker->unique()->word, // Utilizamos unique para asegurar que no se repitan roles para el mismo usuario
            'last_used_at' => null,
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ];
    }
}
