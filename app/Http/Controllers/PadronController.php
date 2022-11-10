<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Padron as p;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class PadronController extends Controller
{
    public function pipol(Request $request){
        $request->nombre = $request->nombre;
        $request->domicilio = Hash::make($request->domicilio);
        $request->clave_elector = Hash::make($request->clave_elector);
        $request->fecha_nacimiento = Hash::make($request->fecha_nacimiento);
        $request->curp = Hash::make($request->curp);
        $request->ocr = Hash::make($request->ocr);
        $request->anio_registro = Hash::make($request->anio_registro);

        $new = new p($request->all());
        $new->nombre = $request->nombre;
        $new->domicilio = $request->domicilio;
        $new->clave_elector = $request->clave_elector;
        $new->fecha_nacimiento = $request->fecha_nacimiento;
        $new->curp = $request->curp;
        $new->ocr = $request->ocr;
        $new->anio_registro = $request->anio_registro;
        $new->save();

        return "a-ok";
    }

    public function login(Request $request){
        $ocr = p::select('ocr','face')->get();

        foreach($ocr as $single){
            if(Hash::check($request->ocr,$single->ocr)){
                $response = Http::withHeaders([
                    'Content-Type' => 'application/json',
                    'x-api-key' => 'ecd759b2-3c78-469b-94cc-bb77e93bdd40'
                ])
                ->post('http://localhost:8000/api/v1/verification/verify',[
                    'source_image' => $request->face,
                    'target_image' => $single->face
                ]);
                $similarity = $response['result'][0]['face_matches'][0]['similarity'];
                if($similarity > 0.94){
                    return "It's a match!";
                }
                return "This ain't it, chief";
            }
        }
    }
}
