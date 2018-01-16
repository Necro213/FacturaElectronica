@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{asset('/css/menubar.css')}}">
@endsection
@section('contentheader_title')
    <h1>Usuarios</h1>
@endsection
@section('content')
    <div id="app">
        <div class="row">
            <div class="col-md-10" align="left">
            </div>
            <div class="col-md-1">
                <a href="#" class="btn btn-success" v-on:click="modalShow"><i class="fa fa-user-plus" aria-hidden="true"></i> Agregar Usuario</a>
            </div>
        </div>
        <br>
        <table id="tabla">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Nivel</th>
                <th>Estado</th>
                <th>Referencia</th>
                <th>Acciones</th>
            </tr>
            </thead>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="modalUsr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h3 class="modal-title" id="exampleModalLabel">Nuevo Usuario</h3>
                    </div>
                    <div class="modal-body">
                        <form id="formUsr">
                            <div class="row">
                                <label for="name">Nombre</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>
                            <br>
                            <div class="row">
                                <label for="ap_pat">Apellido Paterno</label>
                                <input type="text" id="ap_pat" name="ap_pat" class="form-control">
                            </div>
                            <br>
                            <div class="row">
                                <label for="ap_mat">Apellido Materno</label>
                                <input type="text" id="ap_mat" name="ap_mat" class="form-control">
                            </div>
                            <br>
                            <div class="row">
                                <label for="username">Nombre de Usuario</label>
                                <input type="text" id="username" name="username" class="form-control">
                            </div>
                            <br>
                            @if($nivel == 0)
                            <div class="row">
                                <select name="tipo" id="tipo" class="selectpicker">
                                    <option value="@{{ opt.value }}" v-for="opt in options">@{{ opt.text }}</option>
                                </select>
                            </div>
                            @endif
                            <br>
                            <div class="row">
                                <label for="pass">Contraseña</label>
                                <input type="password" id="pass" name="pass" class="form-control">
                            </div>
                            <br>
                            <div class="row">
                                <label for="pass2">Confirmar</label>
                                <input type="password" id="pass2" name="pass2" class="form-control">
                            </div>
                            <br>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" v-on:click="addUser">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/vue/1.0.28/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/vue.resource/1.0.3/vue-resource.min.js"></script>

    <script type="text/javascript" src="http://cdn.jsdelivr.net/vue.table/1.5.3/vue-table.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
    <script src="{{asset("js/forms/users.js")}}"> </script>
@endsection