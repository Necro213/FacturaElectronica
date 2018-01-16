@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="{{asset('/css/menubar.css')}}">
@endsection
@section('contentheader_title')
    <h1>Factura</h1>
@endsection
@section('content')
    <div id="app">
        <hr>
        <form id="factForm">
            <div class="row">
                <div class="col-md-2">
                    <label for="serFac">Serie</label>
                    <select name="serFac" id="serFac" class="selectpicker form-control">
                        <option value="00">Seleccione la Serie</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="folFac">Folio</label>
                    <input type="text" class="form-control" name="folFac" id="folFac">
                </div>
                <div class="col-md-2">
                    <label for="cliFac">Cliente</label>
                    <input type="text" class="form-control" name="cliFac" id="cliFac">
                </div>
                <div class="col-md-6">
                    <br>
                    <select name="ncliFac" id="ncliFac" class="selectpicker form-control">
                        <option value="00">Seleccione al cliente</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div align="right">
                    <div class="col-md-9"><input type="radio"></div>
                    <div class="col-md-3" align="left"><label>Pago en una sola exhibición</label></div>
                    <br>
                    <div class="col-md-9"><input type="radio"></div>
                    <div class="col-md-3" align="left"><label>Pago en parcialidades o diferido</label></div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2">
                    <label for="fecFac">Fecha</label>
                    <input type="date" id="fecFac" name="fecFac" class="form-control">
                </div>
                <div class="col-md-2">
                    <label for="condFac">Condicion de Pago</label>
                    <select name="condFac" id="condFac" class="selectpicker form-control">
                        <option value="00">seleccione condicion</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="formaFac">Forma de Pago 3.3</label>
                    <select name="formaFac" id="formaFac" class="selectpicker form-control">
                        <option value="00">seleccione forma</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="monFac">Moneda 3.3</label>
                    <select name="monFac" id="monFac" class="selectpicker form-control">
                        <option value="00">seleccione moneda</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="tcFac">Tipo cambio</label>
                    <input type="text" class="form-control" name="tcFac" id="tcFac">
                </div>
                <div class="col-md-2">
                    <input type="radio"><label>Factura</label><br>
                    <input type="radio"><label>Nota Credito</label>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label for="taFac">Texto adicional a factura</label>
                    <input type="text" id="taFac" name="taFac" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="usoFac">Uso CFDI 3.3</label>
                    <select name="usoFac" id="usoFac" class="selectpicker form-control">
                        <option value="00">Seleccione Uso CFDI</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"><input type="text" class="form-control"></div>
                <div class="col-md-3"><input type="text" class="form-control"></div>
                <div class="col-md-3"><input type="text" class="form-control"></div>
                <div class="col-md-3"><input type="text" class="form-control"></div>
            </div>
            <div class="row">
                <input type="text" class="form-control">
            </div>
        </form>
        <hr>
        <div class="row">
            <div class="col-md-10" align="left">
            </div>
            <div class="col-md-1">
                <a href="#" class="btn btn-success" v-on:click="modalShow"><i class="fa fa-user-plus" aria-hidden="true"></i> Agregar Producto</a>
            </div>
        </div>
        <br>
        <table id="tabla">
            <thead>
            <tr>
                <th>Descripcion</th>
                <th>Unidad</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Total</th>
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
                        <form id="formProd">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="proFac">Producto</label>
                                    <input type="text" id="proFac" name="proFac" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <br>
                                    <select name="pnameFac" id="pnameFac" class="selectpicker">
                                        <option value="00">Seleccione el Producto</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="canFac">Cantidad</label>
                                    <input type="number" id="canFac" name="canFac" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="prFac">Precio (Desglosar)</label>
                                    <input type="number" id="prFac" name="prFac" class="form-control">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="ivaFac">I.V.A.</label>
                                    <input type="text" id="ivaFac" name="ivaFac" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="iepsFac">IEPS</label>
                                    <input type="text" id="iepsFac" name="iepsFac" class="form-control">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6"></div>
                                <div class="col-md-6">
                                    <label for="totFac">Total</label>
                                    <input type="text" id="totFac" name="totFac" class="form-control">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                    <label for="obsFac">Observacion del Producto</label>
                                <textarea id="obsFac" name="obsFac" class="form-control"></textarea>
                            </div>
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
    <script src="{{asset("js/forms/clientes.js")}}"> </script>
@endsection