<?php

namespace App\Http\Controllers;

use App\Products;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use yajra\Datatables\Datatables;

class productsController extends Controller
{
    function getProducts($id){
        $productos =  DB::table('PRODUCTOS as p')
                ->select('p.CVEPRO','ps.CVEPROSAT','p.DESPRO','u.NOMUNI','u.CVEUNISAT','i.VALTAS','p.FECPRO','p.PR1PRO','p.PR2PRO','p.PR3PRO',
                    'p.PORFLE','ie.VALIEP','ps.DESPROSAT','p.UNIPRO','p.CVETAS','p.CVEIEP')
                ->join('PRODUCTOSSAT as ps','p.CVEPROSAT','=','ps.CVEPROSAT')
                ->join('IMPUESTO as i','p.CVETAS','=','i.CVETAS')
                ->join('UNIMED as u','p.CVEUNI','=','u.CVEUNI')
                ->join('IEPS as ie','p.CVEIEP','=','ie.CVEIEP')
                ->where('p.idUsuario',$id)
                ->get();

        return  Datatables::of(collect($productos))->make(true);
    }

    function newProduct(Request $request){
        try{

            $producto = DB::table('PRODUCTOS')->orderby('CVEPRO','DESC')->take(1)->get();


                Products::create([
                    'CVEPRO' => $producto[0]->CVEPRO+1
                    ,'CVETAS' => $request->ivaPro
                    ,'DESPRO' => $request->descPro
                    ,'UNIPRO' => $request->TUPro
                    ,'FECPRO' => $request->fecPro
                    ,'CODBAR' => $request->codPro
                    ,'PR1PRO' => $request->pr1Pro
                    ,'PR2PRO' => $request->pr2Pro
                    ,'PR3PRO' => $request->pr3Pro
                    ,'PORFLE' => ''
                    ,'OBSREN' => ''
                    ,'CVEIEP'  => $request->iepsPro
                    ,'CVEPROSAT'  => $request->agrupaPro
                    ,'CVEUNI'  => $request->TUPro
                    ,'idUsuario' => base64_decode($request->cookie('admin')['id'])
                ]);

            $respuesta = ["code" => 200, "msg" => 'El producto se agrego correctamente', 'detail' => 'success'];
        }catch (Exception $e){
            $respuesta = ["code" => 500, "msg" => $e, 'detail' => 'error'];
        }

        return Response::json($respuesta);
    }

    function deleteProduct($id){
        try{
            Products::where('CVEPRO',$id)->delete();
            $respuesta = ["code" => 200, "msg" => 'El producto ha sido Eliminado', 'detail' => 'success'];
        }catch (Exception $e){
            $respuesta = ["code" => 500, "msg" => $e, 'detail' => 'error'];
        }

        return Response::json($respuesta);
    }
}
