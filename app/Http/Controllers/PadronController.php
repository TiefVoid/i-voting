<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Padron as p;

class PadronController extends Controller
{
    public function pipol(Request $request){
        $new = new p($request->all());
        $new->save();

        return "a-ok";
    }
}
