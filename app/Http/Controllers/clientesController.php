<?php

namespace App\Http\Controllers;

use App\Clientes;
use App\Products;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use yajra\Datatables\Datatables;

class clientesController extends Controller
{
    function getClientes($id){
        $clientes = Clientes::all()->where('idUsuario',$id);

        return  Datatables::of(collect($clientes))->make(true);
    }

    function newClient(Request $request){
        try{

            $cliente = DB::table('CLIENTES')->orderby('CVECLI','DESC')->take(1)->get();

            Clientes::create([
                'CVECLI' => $cliente[0]->CVECLI+1
                ,'DESCLI' => $request->descCli
                ,'RAZCLI' => $request->razCli
                ,'CPOCLI' => $request->cpCli
                ,'CALCLI' => $request->callCli
                ,'NUMCLI' => $request->numCli
                ,'COLCLI' => $request->locCli
                ,'RFCCLI' =>''
                ,'EMACLI' =>''
                ,'TELCLI' => $request->telCli
                ,'LOCCLI' => $request->locCli
                ,'CIUCLI' => $request->ciuCli
                ,'EDOCLI' => $request->estCli
                ,'PAICLI' => $request->paisCli
                ,'LIMCLI' =>0
                ,'CARCLI' =>0
                ,'ABOCLI' =>0
                ,'APLCED' =>'0'
                ,'APLIEP' => '0'
                ,'APLRIV' => '0'
                ,'NIVPRE' => $request->nprCli
                ,'SERPAR' =>'0'
                ,'PARPOL' => '0'
                ,'RESFIS' => $request->resfCli
                ,'CVEUSO' => $request->usoCli
                ,'idUsuario' => base64_decode($request->cookie('admin')['id'])
            ]);

            $respuesta = ["code" => 200, "msg" => 'El cliente se agrego correctamente', 'detail' => 'success'];
        }catch (Exception $e){
            $respuesta = ["code" => 500, "msg" => $e, 'detail' => 'error'];
        }

        return Response::json($respuesta);
    }

    function deleteClient($id){
        try{
            Clientes::where('CVECLI',$id)->delete();
            $respuesta = ["code" => 200, "msg" => 'El cliente ha sido Eliminado', 'detail' => 'success'];
        }catch (Exception $e){
            $respuesta = ["code" => 500, "msg" => $e, 'detail' => 'error'];
        }

        return Response::json($respuesta);
    }
}
