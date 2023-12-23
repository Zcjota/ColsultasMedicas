<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paciente extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nombre',
        'sexo',
        'fecha_nacimiento',
        'edad',
        'id_num',
        'aseguradora',
        'email',
        'domicilio',
        'telefono',
        'otros',
        'foto',
        'usuario_id',
        'last_used_at'
    ];

    protected $dates = ['deleted_at'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
