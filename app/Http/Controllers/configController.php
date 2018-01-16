<?php

namespace App\Http\Controllers;

use App\SerieFactura;
use App\TipoUnidad;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Response;

class configController extends Controller
{
    function addUnidadDeMedida(Request $request,$id){
        try{
            $tam = TipoUnidad::all()->last();
            TipoUnidad::create([
                'CVEUNI' => 0,
                'NOMUNI'=>$request->desUnidad,
                'CVEUNISAT'=>$request->idUSat,
                'idUsuario'=> $id
            ]);
            $respuesta = ["code" => 200, "msg" => 'La unidad se agrego satisfactoriamente', 'detail' => 'success'];
        }catch (Exception $e){
            $respuesta = ["code" => 500, "msg" => $e->getMessage(), 'detail' => 'error'];
        }

        return Response::json($respuesta);
    }

    function addSerieFactura(Request $request,$id){
        try{
            SerieFactura::create([
                'CVESER' => $request->serieSF,
                'DESSER' => $request->descSF,
                'FOLINI'=>$request->folInSF,
                'FOLFIN'=>$request->folFiSF,
                'FOLACT'=>$request->ulFolSF,
                'idUsuario'=> $id
            ]);
            $respuesta = ["code" => 200, "msg" => 'Folio Agregado Correctamente', 'detail' => 'success'];
        }catch (Exception $e){
            $respuesta = ["code" => 500, "msg" => $e->getMessage(), 'detail' => 'error'];
        }

        return Response::json($respuesta);
    }
}
