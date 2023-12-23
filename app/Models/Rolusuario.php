<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rolusuario extends Model
{
    use SoftDeletes,HasFactory;

    protected $table = 'rolusuarios';

    protected $fillable = [
        'usuario_id',
        'nombre_rol',
        'last_used_at',
    ];

    protected $primaryKey = 'usuario_id';
    // Definición de la relación con la tabla 'usuarios'
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
