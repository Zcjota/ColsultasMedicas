<?php

// app/Models/Usuario.php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use SoftDeletes,HasFactory;
    protected $table = 'usuarios';
    protected $fillable = [
        'nombre',
        'contrasena',
    ];

    public function pacientes(): HasMany
    {
        return $this->hasMany(Paciente::class);
    }

    public function historias(): HasMany
    {
        return $this->hasMany(Historia::class);
    }

    public function citas(): HasMany
    {
        return $this->hasMany(Citas::class);
    }

    // public function rolUsuarios(): HasMany
    // {
    //     return $this->hasMany(RolUsuario::class);
    // }

    public function rolusuario()
    {
        return $this->hasOne(Rolusuario::class, 'usuario_id');
    }
}

