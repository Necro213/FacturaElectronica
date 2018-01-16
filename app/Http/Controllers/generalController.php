<?php

namespace App\Http\Controllers;

use App\Ciudad;
use App\Estado;
use App\IEPS;
use App\IVA;
use App\RegimenFiscal;
use App\ServiciosSAT;
use App\TipoUnidad;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Mockery\Exception;
use yajra\Datatables\Datatables;

class generalController extends Controller
{
    function getConfigForm(Request $request,$id){
        try{
            if($request->cookie('admin') == null){
                return view('auth.login');
            }elseif($request->cookie('admin')) {
                return view('forms.configuraciones',['idUsuario' => $id]);
            }
        }catch (Exception $e){

        }
    }

    function getProductsForm(){
        return view('forms.productos');
    }

    function getClientesForm(){
        return view('forms.clientes');
    }

    function getFacturasForm(){
        return view('forms.facturas');
    }

    function getEstados(){
        try{
            $estados = Estado::all();
            $respuesta = ["code" => 200, "msg" => $estados, 'detail' => 'success'];
        }catch (Exception $e){
            $respuesta = ["code" => 500, "msg" => $e->getMessage(), 'detail' => 'error'];
        }

        return Response::json($respuesta);
    }

    function UnidadDeMedida($id){
        try{
            $unidades = TipoUnidad::all()->where('idUsuario',$id);

            foreach ($unidades as $unidad){
                $dato = DB::select('select nom_uni from Clave_Unidad where clave_unidad = \''.$unidad->CVEUNISAT.'\'');
            $unidad->CVEUNISAT = $dato;
            }

            $respuesta = ["code" => 200, "msg" => $unidades, 'detail' => 'success'];
        }catch (Exception $e){
            $respuesta = ["code" => 500, "msg" => $e->getMessage(), 'detail' => 'error'];
        }

        return  Datatables::of(collect($unidades))->make(true);
    }

    function getCiudades($id){
        try{
            $ciudades = DB::table('MUNICIPIOS')->where('DESEDO',$id)->get();
            $respuesta = ["code" => 200, "msg" => $ciudades, 'detail' => 'success'];
        }catch (Exception $e){
            $respuesta = ["code" => 500, "msg" => $e->getMessage(), 'detail' => 'error'];
        }

        return Response::json($respuesta);
    }

    function getLocalidades($id){
        try{
            $localidades = DB::table('Colonias')->where('des_mun',$id)->get();
            $respuesta = ["code" => 200, "msg" => $localidades, 'detail' => 'success'];
        }catch (Exception $e){
            $respuesta = ["code" => 500, "msg" => $e->getMessage(), 'detail' => 'error'];
        }

        return Response::json($respuesta);
    }

    function  getRegimenFiscal(){
        try{
            $regimen = RegimenFiscal::all();
            $respuesta = ["code" => 200, "msg" => $regimen, 'detail' => 'success'];
        }catch (Exception $e){
            $respuesta = ["code" => 500, "msg" => $e->getMessage(), 'detail' => 'error'];
        }

        return Response::json($respuesta);
    }

    function getIVA(){
        try{
            $iva = IVA::all();
            $respuesta = ["code" => 200, "msg" => $iva, 'detail' => 'success'];
        }catch (Exception $e){
            $respuesta = ["code" => 500, "msg" => $e->getMessage(), 'detail' => 'error'];
        }

        return Response::json($respuesta);
    }

    function getIEPS(){
        try{
            $ieps = IEPS::all();
            $respuesta = ["code" => 200, "msg" => $ieps, 'detail' => 'success'];
        }catch (Exception $e){
            $respuesta = ["code" => 500, "msg" => $e->getMessage(), 'detail' => 'error'];
        }

        return Response::json($respuesta);
    }

    function getTipoUnidad(){
        try{
            $tipo = TipoUnidad::all();
            $respuesta = ["code" => 200, "msg" => $tipo, 'detail' => 'success'];
        }catch (Exception $e){
            $respuesta = ["code" => 500, "msg" => $e->getMessage(), 'detail' => 'error'];
        }

        return Response::json($respuesta);
    }

    function getSerSAT($filtro){
        try{
            if($filtro != "allproducts") {
                $filtro = str_replace('-', ' ', $filtro);
                DB::connection()->disableQueryLog();
                $queries = DB::select('select * from PRODUCTOSSAT where [DESPROSAT] like \'%' . $filtro . '%\''.
                    'or [CVEPROSAT] like \'%' . $filtro . '%\'');
            }else{
                $queries = DB::select('select * from PRODUCTOSSAT');
            }
            $respuesta = ["code" => 200, "msg" => $queries, 'detail' => 'success'];
        }catch (Exception $e){
            $respuesta = ["code" => 500, "msg" => $e->getMessage(), 'detail' => 'error'];
        }

        return  Datatables::of(collect($queries))->make(true);
    }

    function getUnidadesSAT(){
        try{
            DB::connection()->disableQueryLog();
            $queries = DB::select('select * from Clave_Unidad');
            $respuesta = ["code" => 200, "msg" => $queries, 'detail' => 'success'];
        }catch (Exception $e){
            $respuesta = ["code" => 500, "msg" => $e->getMessage(), 'detail' => 'error'];
        }

        return  Datatables::of(collect($queries))->make(true);
    }

    function getMetodosPago(){
        try{
            DB::connection()->disableQueryLog();
            $queries = DB::select('select * from FORMASDEPAGOSAT');
            $respuesta = ["code" => 200, "msg" => $queries, 'detail' => 'success'];
        }catch (Exception $e){
            $respuesta = ["code" => 500, "msg" => $e->getMessage(), 'detail' => 'error'];
        }

        return  Datatables::of(collect($queries))->make(true);
    }
}
