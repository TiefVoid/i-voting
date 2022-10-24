<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Padron extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';

    protected $table="padron";

    protected $primaryKey = 'id';
    
    public $timestamps = false;

    public $fillable = [
        'nombre',
        'domicilio',
        'clave_elector',
        'fecha_nacimiento',
        'curp',
        'ocr',
        'anio_registro',
        'emision',
        'vigencia',
        'edad',
        'face',
        'localidad',
        'estado',
        'municipio',
        'seccion',
        'sexo',
        'edad',
        'voto'
    ];
}
