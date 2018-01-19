@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{asset('/css/menubar.css')}}">
@endsection
@section('contentheader_title')
    <h1>Clientes</h1>
@endsection
@section('content')
    <div id="app">
        <input type="hidden" id="id" value="{{$id}}">
        <div class="row">
            <div class="col-md-10" align="left">
            </div>
            <div class="col-md-1">
                <a href="#" class="btn btn-success" v-on:click="modalShow"><i class="fa fa-user-plus" aria-hidden="true"></i> Agregar Cliente</a>
            </div>
        </div>
        <br>
        <table id="tabla">
            <thead>
            <tr>
                <th>Descripcion</th>
                <th>Calle</th>
                <th>No.</th>
                <th>Colonia</th>
                <th>Ciudad</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
            </thead>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="modalCli" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h3 class="modal-title" id="exampleModalLabel">Nuevo Cliente</h3>
                    </div>
                    <div class="modal-body">
                        <form id="formCli">
                            <div class="row">
                                <label for="descCli">Descripcion</label>
                                <input type="text" id="descCli" name="descCli" class="form-control">
                            </div>
                            <br>
                            <div class="row">
                                    <label for="razCli">Razon Social</label>
                                    <input type="text" id="razCli" name="razCli" class="form-control">
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="cpCli">Codigo Postal</label>
                                    <input type="text" id="cpCli" name="cpCli" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="nprCli">Nivel de Precio</label>
                                    <select name="nprCli" id="nprCli" class="selectpicker">
                                        <option value="00">Seleccione el precio</option>
                                        <option value="1">Precio 1</option>
                                        <option value="2">Precio 2</option>
                                        <option value="3">Precio 3</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="estCli">Estado</label>
                                    <select name="estCli" id="estCli" class="selectpicker" v-on:change="ciudades" data-live-search="true">
                                        <option value="00">Seleccione el Estado</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="ciuCli">Ciudad</label>
                                    <select name="ciuCli" id="ciuCli" class="selectpicker" v-on:change="localidades" data-live-search="true">
                                        <option value="00">Seleccione la Ciudad</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="locCli">Localidad</label>
                                    <select name="locCli" id="locCli" class="selectpicker" data-live-search="true">
                                        <option value="00">Seleccione la Localidad</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="callCli">Calle</label>
                                    <input type="text" id="callCli" name="callCli" class="form-control">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="numCli">Numero</label>
                                    <input type="number" id="numCli" name="numcli" class="form-control">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="telCli">Telefonos</label>
                                    <input type="text" id="telCli" name="telCli" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="paisCli">Pais</label>
                                    <input type="text" id="paisCli" name="paisCli" class="form-control">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="resfCli">Recidencia Fiscal (ver 3.3)</label>
                                    <input type="text" id="resfCli" name="resfCli" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <input type="checkbox" id="retCli" name="retCli"><label>Aplica Retencion I.V.A.</label><br>
                                    <input type="checkbox" id="desgCli" name="desgCli"><label>Desglosar IEPS</label><br>
                                    <input type="checkbox" id="partCli" name="partCli"><label>Este cliente es partido politico</label>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <label for="usoCli">Uso cfdi (ver 3.3)</label>
                                <select name="usoCli" id="usoCli" class="selectpicker form-control" data-live-search="true">
                                    <option value="00">Seleccione USO CFDI</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" v-on:click="addClient">Guardar</button>
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
    <script src="{{asset("js/forms/clientes.js")}}"> </script>
@endsection