<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuickVote extends Model
{
    use HasFactory;

    protected $connection = 'mysql';

    protected $table="quick_count";

    protected $primaryKey = 'id';
    
    public $timestamps = false;

    public $fillable = [
        'localidad',
        'estado',
        'municipio',
        'seccion',
        'sexo',
        'edad',
        'voto'
    ];
}
