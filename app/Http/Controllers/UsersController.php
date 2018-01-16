<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use yajra\Datatables\Datatables;

class UsersController extends Controller
{
    function userForm(Request $request){
        try{
            if($request->cookie('admin') == null){
                return view('auth.login');
            }elseif($request->cookie('admin')) {
                return view('forms.users',['nivel'=>$request->cookie('admin')['rol']]);
            }
        }catch (Exception $e){
                return view('errors.500');
        }
    }

    public function doLogin(Request $request)
    {
        try {
            $cookie = null;
            $users = User::where('username', $request->email)->firstOrFail();

            if ($request->password == $users->password && $users->status == true) {
                $datos = [
                    'id' => base64_encode($users->id),
                    'rol' => $users->level,
                ];
                if ($users->level == "0" || $users->level == "1") {
                    $cookie = Cookie::make('admin', $datos, 180);
                } else {
                    $cookie = Cookie::make('cliente', $datos, 360);
                }

                $respuesta = [
                    'code' => 200,
                    'msg' => $datos,
                    'detail' => 'success'
                ];
            } else {
                $respuesta = [
                    'code' => 500,
                    'msg' => "Las credenciales son incorrectas o el Usuario no está Activo",
                    'detail' => 'error'
                ];
            }
        } catch (\Exception $exception) {
            $respuesta = [
                'code' => 500,
                'msg' => $exception->getMessage(),
                'detail' => 'error'
            ];

        }
        if ($cookie != null)
            return Response::json($respuesta)->withCookie($cookie);
        else
            return Response::json($respuesta);
    }

    public function doLogout(Request $request)
    {
        if ($request->query('id') != null) {
            if ($request->cookie('cliente') != null) {
                Cookie::forget('cliente');
                return redirect()->route('index')->withCookie(Cookie::forget('cliente'));
            }
        } else {
            if ($request->cookie('admin') != null) {
                Cookie::forget('admin');
                return redirect()->route('index')->withCookie(Cookie::forget('admin'));
            }
        }
    }

    function getUsrs(Request $request){
        try {
            if ($request->cookie('admin')['rol'] == 0) {
                $users = DB::table('users')->get();
            } elseif ($request->cookie('admin')['rol'] == 1) {
                $users = DB::table('users')->where('idReferencia', base64_decode($request->cookie('admin')['id']))->get();
            }

            foreach ($users as $user) {
                if ($user->idReferencia != null) {
                    $referencia = DB::table('users')->where('id', $user->idReferencia)->first();
                    $user->idReferencia = $referencia->nombre . ' ' . $referencia->ap_pat . ' ' . $referencia->ap_mat;
                }
            }

            return Datatables::of(collect($users))->make(true);
        }catch (Exception $e){
            return view('errors.500');
        }
    }

    function addUser(Request $request){
        try{
            if($request->cookie('admin')['rol'] == 1) {
                $user = User::create([
                    'nombre' => $request->name,
                    'ap_pat' => $request->ap_pat,
                    'ap_mat' => $request->ap_mat,
                    'username' => $request->username,
                    'password' => $request->pass,
                    'level' => 2,
                    'status' => True,
                    'idReferencia' => base64_decode($request->cookie('admin')['id']),
                ]);
            }else{
                $user = User::create([
                    'nombre' => $request->name,
                    'ap_pat' => $request->ap_pat,
                    'ap_mat' => $request->ap_mat,
                    'username' => $request->username,
                    'password' => $request->pass,
                    'level' => $request->tipo,
                    'status' => True,
                    'idReferencia' => base64_decode($request->cookie('admin')['id']),
                ]);
            }

           $user->save();

            $respuesta = ["code" => 200, "msg" => 'El usuario fue creado exitosamente', 'detail' => 'success'];
        }catch (Exception $e){
            $respuesta = ["code" => 500, "msg" => 'Error el usuario no fue Creado', 'detail' => 'error'];
        }

        return Response::json($respuesta);
    }
}
