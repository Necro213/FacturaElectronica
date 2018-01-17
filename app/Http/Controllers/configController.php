<?php

namespace App\Http\Controllers;

use App\Config;
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

    function saveConfiguration(Request $request, $id){
        Config::create([
            'idUsuario' => $id
            ,'RAZ1CFG' => $request->razonsoc
            ,'RAZ2CFG' => $request->subrep
            ,'CPOCFG' => $request->emiCP
            ,'LOCCFG' => $request->emiLoc
            ,'CIUCFG' => $request->emiCiu
            ,'EDOCFG' => $request->EmiEst
            ,'COLCFG' => $request->emiLoc
            ,'CALCFG' => $request->emiCalle
            ,'PAICFG' => $request->emiPais
            ,'NUMCFG' => $request->NExt
            ,'RFCCFG' => $request->emiRFC
            ,'EMACFG' => $request->emiMail
            ,'TELCFG' => $request->emiTel
            ,'REGCFG' => $request->emiRF
            ,'PAGCFG' => $request->emiPag
            ,'CERCFG'
            ,'FIRCFG'
            ,'DIGCFG'
            ,'DIRCFG'
            ,'TIPCFG'
            ,'TILCFG'
            ,'TBBCFG'
            ,'SFICFG'
            ,'LOGPCFG'
            ,'PASPCFG'
            ,'LOGLCFG'
            ,'PASLCFG'
            ,'APRCFG'
            ,'VIGCFG'
            ,'COP1CFG'
            ,'IMP1CFG'
            ,'BAN1CFG'
            ,'COP2CFG'
            ,'IMP2CFG'
            ,'BAN2CFG'
            ,'COP3CFG'
            ,'IMP3CFG'
            ,'BAN3CFG'
            ,'COP4CFG'
            ,'IMP4CFG'
            ,'BAN4CFG'
            ,'LOGCFG'
            ,'LBBCFG'
            ,'ENVEMACFG'
            ,'PASCFG'
            ,'MODCFG'
            ,'RECARRE'
            ,'RECHON'
            ,'RETISR'
            ,'RETIVA'
            ,'RETCEL'
            ,'SERPRO'
            ,'MODCON'
            ,'QRYCON'
            ,'FACTRS'
            ,'RECDON'
            ,'TEXADI'
            ,'DESIVA'
            ,'NUMINTCFG'
            ,'EDOCFG_SUC'
            ,'CALCFG_SUC'
            ,'NUMCFG_SUC'
            ,'NUMINTCFG_SUC'
            ,'COLCFG_SUC'
            ,'LOCCFG_SUC'
            ,'CIUCFG_SUC'
            ,'CPOCFG_SUC'
            ,'NOTSER'
            ,'FORDEC'
            ,'TEXRET'
            ,'CLACSD'
            ,'FILKEY'
            ,'FILCER'
            ,'STSDOSLIS'
            ,'TEXIVA'
            ,'SERPAR'
            ,'NUMAUT'
            ,'FECAUT'
            ,'METPAG'
            ,'CVEREG'
            ,'MODINT'
        ]);
    }
}
