<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    // Definir los atributos que se pueden asignar masivamente
    protected $fillable = ['nombre', 'apellidos', 'telefono', 'correo_electronico'];

    // Definir la relación con el modelo Dispositivo
    public function dispositivo()
    {
        return $this->hasMany(Dispositivo::class,'cliente_id');  // Un cliente puede terner muchos dispositivos
}
}