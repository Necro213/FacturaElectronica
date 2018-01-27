<?php

namespace App\Http\Controllers;

use App\Config;
use App\SerieFactura;
use App\TipoUnidad;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Mockery\Exception;

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
       $config = DB::select('select * from EMISOR where idUsuario = '.$id);

       if($config == null){
           $respuesta = $this->nuevaConfig($request,$id);
       }else{
           $respuesta = $this->updateConfig($request,$id);
       }

        return Response::json($respuesta);
    }

    function nuevaConfig(Request $request,$id){
        try{

            DB::beginTransaction();

            DB::table('TIMBRADO')->insert([
                'idUsuario' => $id
                ,'WERSERPRU' => $request->timweserp
                ,'USER' => $request->userTimP
                ,'PASS' => $request->passTimP
                ,'WEBSERONL' => $request->timweser
                ,'PASSONL' => $request->userTim
                ,'USERONL' => $request->passTim
            ]);

            DB::table('NOTARIO')->insert([
                'idUsuario' => $id
                ,'ENTIDADFED' => $request->notEntidad
                ,'CURP' => $request->notCURP
                ,'NUMNOT' => $request->notNo
                ,'ADSCRIPCION' => $request->notAd
            ]);

            DB::table('CONFGEN')->insert([
                'idUsuario' => $id
                ,'ANEXARAXML' => $request->anexarXML
                ,'UTILIZARREM' => $request->remDes
            ]);

            if ($request->metodo == 'puse'){
                $puse = 1;
                $ppod = 0;
            }else{
                $puse = 0;
                $ppod = 1;
            }

            $file = $request->file('logo');
            if($file!=null) {
                $nombre = 'logo' . $id . '.png';
                Storage::disk('local')->put('/img/logos/'.$nombre,\File::get($file));
            }else{
                $nombre = '';
            }
            DB::table('EMISOR')->insert([
                'idUsuario' => $id
                ,'RAZSOC' => $request->razonsoc
                ,'SUBTIT' => $request->subrep
                ,'CP' => $request->emiCP
                ,'ESTADO' => $request->emiEst
                ,'CIUDAD' => $request->emiCiu
                ,'LOCALIDAD' => $request->emiLoc
                ,'CALLE' => $request->emiCalle
                ,'NUMINT' => $request->emiNIn
                ,'NUMEXT' => $request->emiNEx
                ,'RFC' => $request->emiRFC
                ,'PAIS' => $request->emiPais
                ,'REGFIS' => $request->emiRF
                ,'REGINC' => $request->reginc
                ,'USEX' => $puse
                ,'PARODIF' => $ppod
                ,'LOGO' => $nombre
                ,'TEL' => $request->emiTel
                ,'MAIL' => $request->emiMail
                ,'PASS' => $request->emiPassMail
            ]);

            DB::table('SUCURSAL')->insert([
                'idUsuario' => $id
                ,'CP'  => $request->sucCP
                ,'ESTADO' => $request->sucEst
                ,'CIUDAD' => $request->sucCiu
                ,'LOCALIDAD' => $request->sucLoc
                ,'CALLE' => $request->sucCalle
                ,'NUMINT' => $request->sucNoInt
                ,'NUMEXT' => $request->sucNoExt
                ,'COLONIA' => $request->sucCol
            ]);



            $cerkey = $request->file('cerdigkey');
            $nameck = ($cerkey != null) ? 'cerdig'.$id.'.key' : '';
            $cercer = $request->file('cerdigcer');
            $namecc = ($cercer != null) ? 'cerdig'.$id.'.cer' : '';
            $archivokey = $request->file('archivokey');
            $nameak = ($archivokey != null) ? 'archivo'.$id.'.key' : '';
            $archivocer = $request->file('archivocer');
            $nameac = ($archivokey != null) ? 'archivo'.$id.'.cer' : '';

            ($cerkey != null) ? Storage::disk('local')->put('/certificados/key/cerdig'.$id.'.key',\File::get($cerkey)) : '';
            ($cercer != null) ? Storage::disk('local')->put('/certificados/cer/cerdig'.$id.'.cer',\File::get($cercer)) : '';
            ($archivokey != null) ? Storage::disk('local')->put('/certificados/key/archivo'.$id.'.key',\File::get($archivokey)) : '';
            ($archivokey != null) ? Storage::disk('local')->put('/certificados/cer/archivo'.$id.'.cer',\File::get($archivocer)) : '';

            DB::table('CERTIFICADOS')->insert([
                'idUsuario' => $id
                ,'CERDIGKEY' => $nameck
                ,'CERDIGCER' => $namecc
                ,'CERDIGNUM' => $request->numeroCer
                ,'ARCHIVOKEY' => $nameak
                ,'ARCHIVOCER' => $nameac
                ,'CLAVE' => $request->claveCSD
                ,'COMENTARIO' => $request->areaCer
            ]);

            DB::table('VARIOS')->insert([
                'idUsuario' => $id
                ,'ENVCORR' => $request->enviarCorreos
                ,'ARRENDAMIENTO' => $request->reciboArrendamiento
                ,'HONORARIOS' => $request->reciboHonorario
                ,'SERVPROF' => $request->factServ
                ,'DONATIVOS' => $request->recDon
                ,'HOSPEDAJE' => $request->retHosp
                ,'TEXTIVA' => $request->textIVA
                ,'NOAUT' => $request->noAut
                ,'LEYENDA' => $request->leyenda
                ,'RETIVA' => $request->retIVA
                ,'RETISR' => $request->retISR
                ,'RETCED' => $request->retCed
                ,'FECHAAUT' => $request->fechaAut
                ,'IMPEXCEL' => $request->modIEX
                ,'IVAPRO' => $request->ivaProd
                ,'USARTRES' => $request->tresListas
            ]);
            DB::commit();

            $respuesta = ["code" => 200, "msg" => 'La configuracion se guardo correctamente', 'detail' => 'success'];
        }catch (Exception $e){
            DB::rollBack();
            $respuesta = ["code" => 500, "msg" => $e, 'detail' => 'success'];
        }
        return $respuesta;
    }

    function updateConfig(Request $request,$id){
        try{

            DB::beginTransaction();

            DB::table('TIMBRADO')->where('idUsuario',$id)->update([
                'idUsuario' => $id
                ,'WERSERPRU' => $request->timweserp
                ,'USER' => $request->userTimP
                ,'PASS' => $request->passTimP
                ,'WEBSERONL' => $request->timweser
                ,'PASSONL' => $request->userTim
                ,'USERONL' => $request->passTim
            ]);

            DB::table('NOTARIO')->where('idUsuario',$id)->update([
                'idUsuario' => $id
                ,'ENTIDADFED' => $request->notEntidad
                ,'CURP' => $request->notCURP
                ,'NUMNOT' => $request->notNo
                ,'ADSCRIPCION' => $request->notAd
            ]);

            DB::table('CONFGEN')->where('idUsuario',$id)->update([
                'idUsuario' => $id
                ,'ANEXARAXML' => $request->anexarXML
                ,'UTILIZARREM' => $request->remDes
            ]);

            if ($request->metodo == 'puse'){
                $puse = 1;
                $ppod = 0;
            }else{
                $puse = 0;
                $ppod = 1;
            }

            $file = $request->file('logo');
            if($file!=null) {
                $nombre = 'logo' . $id . '.png';
                Storage::disk('local')->put('/img/logos/'.$nombre,\File::get($file));
            }else{
                $nombre = '';
            }
            DB::table('EMISOR')->where('idUsuario',$id)->update([
                'idUsuario' => $id
                ,'RAZSOC' => $request->razonsoc
                ,'SUBTIT' => $request->subrep
                ,'CP' => $request->emiCP
                ,'ESTADO' => $request->emiEst
                ,'CIUDAD' => $request->emiCiu
                ,'LOCALIDAD' => $request->emiLoc
                ,'CALLE' => $request->emiCalle
                ,'NUMINT' => $request->emiNIn
                ,'NUMEXT' => $request->emiNEx
                ,'RFC' => $request->emiRFC
                ,'PAIS' => $request->emiPais
                ,'REGFIS' => $request->emiRF
                ,'REGINC' => $request->reginc
                ,'USEX' => $puse
                ,'PARODIF' => $ppod
                ,'LOGO' => $nombre
                ,'TEL' => $request->emiTel
                ,'MAIL' => $request->emiMail
                ,'PASS' => $request->emiPassMail
            ]);

            DB::table('SUCURSAL')->where('idUsuario',$id)->update([
                'idUsuario' => $id
                ,'CP'  => $request->sucCP
                ,'ESTADO' => $request->sucEst
                ,'CIUDAD' => $request->sucCiu
                ,'LOCALIDAD' => $request->sucLoc
                ,'CALLE' => $request->sucCalle
                ,'NUMINT' => $request->sucNoInt
                ,'NUMEXT' => $request->sucNoExt
                ,'COLONIA' => $request->sucCol
            ]);



            $cerkey = $request->file('cerdigkey');
            $nameck = ($cerkey != null) ? 'cerdig'.$id.'.key' : '';
            $cercer = $request->file('cerdigcer');
            $namecc = ($cercer != null) ? 'cerdig'.$id.'.cer' : '';
            $archivokey = $request->file('archivokey');
            $nameak = ($archivokey != null) ? 'archivo'.$id.'.key' : '';
            $archivocer = $request->file('archivocer');
            $nameac = ($archivokey != null) ? 'archivo'.$id.'.cer' : '';

            ($cerkey != null) ? Storage::disk('local')->put('/certificados/key/cerdig'.$id.'.key',\File::get($cerkey)) : '';
            ($cercer != null) ? Storage::disk('local')->put('/certificados/cer/cerdig'.$id.'.cer',\File::get($cercer)) : '';
            ($archivokey != null) ? Storage::disk('local')->put('/certificados/key/archivo'.$id.'.key',\File::get($archivokey)) : '';
            ($archivokey != null) ? Storage::disk('local')->put('/certificados/cer/archivo'.$id.'.cer',\File::get($archivocer)) : '';

            DB::table('CERTIFICADOS')->where('idUsuario',$id)->update([
                'idUsuario' => $id
                ,'CERDIGKEY' => $nameck
                ,'CERDIGCER' => $namecc
                ,'CERDIGNUM' => $request->numeroCer
                ,'ARCHIVOKEY' => $nameak
                ,'ARCHIVOCER' => $nameac
                ,'CLAVE' => $request->claveCSD
                ,'COMENTARIO' => $request->areaCer
            ]);

            DB::table('VARIOS')->where('idUsuario',$id)->update([
                'idUsuario' => $id
                ,'ENVCORR' => $request->enviarCorreos
                ,'ARRENDAMIENTO' => $request->reciboArrendamiento
                ,'HONORARIOS' => $request->reciboHonorario
                ,'SERVPROF' => $request->factServ
                ,'DONATIVOS' => $request->recDon
                ,'HOSPEDAJE' => $request->retHosp
                ,'TEXTIVA' => $request->textIVA
                ,'NOAUT' => $request->noAut
                ,'LEYENDA' => $request->leyenda
                ,'RETIVA' => $request->retIVA
                ,'RETISR' => $request->retISR
                ,'RETCED' => $request->retCed
                ,'FECHAAUT' => $request->fechaAut
                ,'IMPEXCEL' => $request->modIEX
                ,'IVAPRO' => $request->ivaProd
                ,'USARTRES' => $request->tresListas
            ]);
            DB::commit();

            $respuesta = ["code" => 200, "msg" => 'La configuracion se actualizo correctamente', 'detail' => 'success'];
        }catch (Exception $e){
            DB::rollBack();
            $respuesta = ["code" => 500, "msg" => $e, 'detail' => 'success'];
        }
        return $respuesta;
    }

}
