<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UsuarioFactory extends Factory
{
    protected $model = Usuario::class;

    public function definition()
    {
        $nombreUsuario = $this->faker->unique()->userName;
        $contrasena = $this->faker->regexify('[A-Za-z0-9]{8,16}');

        return [
            'nombre' => $nombreUsuario,
            'contrasena' => bcrypt($contrasena),
            'last_used_at' => null,
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
        ];
    }
}
