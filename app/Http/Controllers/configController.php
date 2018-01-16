<?php

namespace App\Http\Controllers;

use App\TipoUnidad;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Response;

class configController extends Controller
{
    function addUnidadDeMedida(Request $request){
        try{
            $tam = TipoUnidad::all()->count();
            TipoUnidad::create([
                'CVEUNI' => $tam+1,
                'NOMUNI'=>$request->desUnidad,
                'CVEUNISAT'=>$request->idUSat
            ]);
            $respuesta = ["code" => 200, "msg" => 'La unidad se agrego satisfactoriamente', 'detail' => 'success'];
        }catch (Exception $e){
            $respuesta = ["code" => 500, "msg" => $e->getMessage(), 'detail' => 'error'];
        }

        return Response::json($respuesta);
    }
}
