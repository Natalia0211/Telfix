<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table = 'empleados';
    protected $fillable = ['nombre', 'apellidos', 'cargo', 'fecha_contratacion',  ];
    
    protected $dates = ['fecha_contratacion',];

    public $timestamps = true;
}
