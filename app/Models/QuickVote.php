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
    
    public $timestamps = true;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s'
    ];

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
