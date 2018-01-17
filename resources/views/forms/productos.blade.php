@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{asset('/css/menubar.css')}}">
@endsection
@section('contentheader_title')
    <h1>Productos</h1>
@endsection
@section('content')
    <div id="app">
        <input type="hidden" id="idUsuario" value="{{$id}}">
        <div class="row">
            <div class="col-md-10" align="left">
            </div>
            <div class="col-md-1">
                <a href="#" class="btn btn-success" v-on:click="modalShow"><i class="fa fa-user-plus" aria-hidden="true"></i> Agregar Producto</a>
            </div>
        </div>
        <br>
        <table id="tablaProd">
            <thead>
            <tr>
                <th>Clave</th>
                <th>Descripcion</th>
                <th>Tipo Unidad</th>
                <th>clave unidad</th>
                <th>Asoc. prod/serv SAT</th>
                <th>I.V.A.</th>
                <th>IEPS</th>
                <th>Fecha</th>
                <th>Precio 1</th>
                <th>Precio 2</th>
                <th>Precio 3</th>
                <th>Acciones</th>
            </tr>
            </thead>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="modalPro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h3 class="modal-title" id="exampleModalLabel">Nuevo Producto</h3>
                    </div>
                    <div class="modal-body">
                        <form id="formProd">
                            <div class="row">
                                <label for="descPro">Descripcion</label>
                                <input type="text" id="descPro" name="descPro" class="form-control">
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="TUPro">Tipo Unidad (3.3)</label>
                                    <select name="TUPro" id="TUPro" class="selectpicker">
                                        <option value="00">Tipo Unidad</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="ivaPro">Impuesto (I.V.A.)</label>
                                    <select name="ivaPro" id="ivaPro" class="selectpicker">
                                        <option value="00">Seleccione el impuesto</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="iepsPro">Impuesto (IEPS)</label>
                                    <select name="iepsPro" id="iepsPro" class="selectpicker">
                                        <option value="00">Seleccione el impuesto</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="pr1Pro">Precio</label>
                                    <input type="number" id="pr1Pro" name="pr1Pro" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="pr2Pro">Precio #2</label>
                                    <input type="number" id="pr2Pro" name="pr2Pro" class="form-control">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="pr3Pro">Precio #3</label>
                                    <input type="number" id="pr3Pro" name="pr3Pro" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="codPro">Codigo de Barras</label>
                                    <input type="text" id="codPro" name="codPro" class="form-control">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fecPro">Fecha de alta</label>
                                    <input type="date" id="fecPro" name="fecPro" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="retPro">Retencion especial x%</label>
                                    <input type="text" id="retPro" name="retPro" class="form-control">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div>
                                    <label for="agrupaPro">Agrupa producto Servicio SAT 3.3</label>
                                    <input type="text" class="form-control" id="agrupaProDes">
                                    <input type="hidden" id="agrupaPro" name="agrupaPro">
                                    <br>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" id="filtratabla"
                                                   v-model="filtro" placeholder="Busqueda" v-on:keyup.enter="filtrar">
                                        </div>
                                        <div class="col-md-2">
                                            <a href="#" class="btn btn-success" v-on:click="filtrar">
                                                Buscar
                                            </a>
                                        </div>
                                    </div>
                                    <br>
                                    <table id="tablaProSAT">
                                        <thead>
                                        <tr>
                                            <td>Clave</td>
                                            <td>Producto</td>
                                            <td>Acciones</td>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" v-on:click="newProduct">Guardar</button>
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
    <script src="{{asset("js/forms/products.js")}}"> </script>
@endsection