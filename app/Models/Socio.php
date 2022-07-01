<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socio extends Model
{
    use HasFactory;
    protected $table = 'socios';
    protected $fillable = ['nombre', 'apellido', 'doc', 'fecha_nac', 'lugar_nac', 'nacionalidad', 'profesion', 'domicilio', 'email', 'localidad', 'c_postal', 'tel_laboral', 'tel_residencia'];
}
