<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuickVote as qv;

class QuickVoteController extends Controller
{
    public function vote(){
        $new = new qv();
        $new->localidad = '0001';
        $new->estado = '30';
        $new->municipio = '046';
        $new->seccion = '1065';
        $new->sexo = 'M';
        $new->edad = 22;
        $new->voto = 'PAN';
        $new->save();

        return "a-ok";
    }
}
