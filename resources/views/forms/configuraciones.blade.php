@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <link href="{{asset('/css/forms/inputfile.css')}}" media="all" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{asset('/css/menubar.css')}}">
@endsection
@section('contentheader_title')
    <h1>Configuracion</h1>
@endsection
@section('content')
    <div id="app">
        <div class="col-md-12">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab1default" data-toggle="tab">EMISOR</a></li>
                        <li><a href="#tab2default" data-toggle="tab">CERTIFICADOS</a></li>
                        <li><a href="#tab3default" data-toggle="tab">CONFIGURA TIMBRADO</a></li>
                        <li><a href="#tab4default" data-toggle="tab">COMPLEMENTOS</a></li>
                        <li><a href="#tab5default" data-toggle="tab">VARIOS</a></li>
                        <li><a href="#tab6default" data-toggle="tab">TRANSPORTE</a></li>
                        <li><a href="#tab7default" data-toggle="tab">NOTARIO</a></li>
                        <li><a href="#tab8default" data-toggle="tab">IVA</a></li>
                        <li><a href="#tab9default" data-toggle="tab">IEPS</a></li>
                        <li><a href="#tab10default" data-toggle="tab">UNIDAD DE MEDIDA</a></li>
                        <li><a href="#tab11default" data-toggle="tab">FORMAS DE PAGO</a></li>
                        <li><a href="#tab12default" data-toggle="tab">SERIES FACTURAS</a></li>
                    </ul>
                </div>
                <form id="configForm">
                    <div class="panel-body">
                        <div class="tab-content">


                            <div class="tab-pane fade in active" id="tab1default">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="razonsoc">
                                            Razón Social
                                        </label>
                                        <input type="text" placeholder="Razón Social" class="form-control" name="razonsoc" id="razonsoc">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="subrep">Subtitulo en Reportes</label>
                                        <input type="text" placeholder="Subtitulo en Reportes" class="form-control"
                                                name="subrep" id="subrep">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="emiCP">Codigo Postal</label>
                                        <input type="text" placeholder="Codigo Postal" class="form-control"
                                               name="emiCP" id="emiCP">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="emiEst">Estado</label>
                                        <br>
                                        <select name="emiEst" id="emiEst" class="selectpicker" data-live-search="true"
                                        v-on:change="ciudades">
                                            <option value="00">Seleccione un Estado</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="emiCiu">Ciudad</label>
                                        <br>
                                        <select name="emiCiu" id="emiCiu" class="selectpicker" data-live-search="true"
                                        v-on:change="localidades">
                                            <option value="00">Seleccione una Ciudad</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="emiLoc">Localidad</label>
                                        <br>
                                        <select name="emiLoc" id="emiLoc" class="selectpicker" data-live-search="true">
                                            <option value="00">Seleccione una Localidad</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="emiCalle">Calle</label>
                                        <input type="text" placeholder="Calle" class="form-control" id="emiCalle" name="emiCalle">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="emiNEx">No. Exterior</label>
                                        <input type="text" placeholder="No. Exterior" class="form-control" id="emiNEx" name="emiNEx">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="emiNIn">No. Interior</label>
                                        <input type="text" placeholder="No. Interior" class="form-control" id="emiNIn" name="emiNIn">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="emiRFC">RFC</label>
                                        <input type="text" placeholder="RFC" name="emiRFC" id="emiRFC" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="emiPais">Pais</label>
                                        <input type="text" id="emiPais" name="emiPais" placeholder="Pais" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="emiRF">Regimen Fiscal (ver. 3.3)</label>
                                        <br>
                                        <select name="emiRF" id="emiRF" class="selectpicker">
                                            <option value="00">Seleccione RegimenFiscal</option>
                                        </select>
                                        <input type="text" class="form-control" placeholder="Regimen de Incorporacion"
                                               name="reginc" id="reginc">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="pag">Metodo Pago (ver. 3.3)</label>
                                        <div>
                                            <input type="radio"> Pago en una sola exhibición
                                            <br>
                                            <input type="radio"> Pago en parcialidades o diferido
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="image">Logotipo</label>
                                        <div class="input-group image-preview" id="image">
                                            <input type="text" class="form-control image-preview-filename"
                                                   disabled="disabled" id="logo" name="logo">
                                            <!-- don't give a name === doesn't send on POST/GET -->
                                            <span class="input-group-btn">
                    <!-- image-preview-clear button -->
                                              <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                                    <span class="glyphicon glyphicon-remove"></span> Clear
                                              </button>
                                                <!-- image-preview-input -->
                                                <div class="btn btn-default image-preview-input">
                                                    <span class="glyphicon glyphicon-folder-open"></span>
                                                    <span class="image-preview-input-title">Browse</span>
                                                    <input type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview"/>
                        <!-- rename it -->
                                                </div>
                                            </span>
                                        </div><!-- /input-group image-preview [TO HERE]-->
                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <label for="emiTel">Telefono</label>
                                            <input type="tel" class="form-control" name="emiTel" id="emiTel" placeholder="Telefono">
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="emiMail">e-mail GMAIL para envio autom</label>
                                                <input type="email" id="emiMail" name="emiMail"
                                                       class="form-control" placeholder="Email">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="emiPassMail">Password GMAIL</label>
                                                <input type="password" id="emiPassMail" name="emiPassMail"
                                                       class="form-control" placeholder="**************">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h3><label>SUCURSAL</label></h3>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="sucEst">Estado</label>
                                        <input type="text" class="form-control" id="sucEst" name="sucEst" placeholder="Estado">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="sucCiu">Ciudad</label>
                                        <input type="text" class="form-control" id="sucCiu" name="sucCiu" placeholder="Ciudad">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="sucLoc">Localida</label>
                                        <input type="text" class="form-control" id="sucLoc" name="sucLoc" placeholder="Localidad">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="sucCalle">Calle</label>
                                        <input type="text" class="form-control" id="sucCalle" name="sucCalle" placeholder="Calle">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="sucNoExt">No. Exterior</label>
                                        <input type="text" class="form-control" id="sucNoExt" name="sucNoExt" placeholder="No. Exterior">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="sucNoInt">No. Interior</label>
                                        <input type="text" class="form-control" id="sucNoInt" name="sucNoInt" placeholder="No. Interior">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="sucCol">Colonia</label>
                                        <input type="text" class="form-control" id="sucCol" name="sucCol" placeholder="Colonia">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="sucCP">C. P.</label>
                                        <input type="text" class="form-control" id="sucCP" name="sucCP" placeholder="C. P.">
                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane fade" id="tab2default">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Llave de certificado digital (.key)</label>
                                        <br>
                                        <!-- file input -->
                                        <div class="btn-group col-md-12" role="group">
                                            <div class="btn-group" role="group">
                                        <span class="btn btn-primary btn-file">
                                                Browse <input type="file" name="llaveKey" id="llaveKey">
                                        </span>
                                            </div>
                                            <div class="btn-group" role="group">
                                                <input type="text" name="llave" class="form-control">
                                            </div>
                                        </div>
                                        <!--fin file input -->
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Certificado digital (.cer)</label>
                                        <br>
                                        <!-- file input -->
                                        <div class="btn-group col-md-12" role="group">
                                            <div class="btn-group" role="group">
                                        <span class="btn btn-primary btn-file">
                                                Browse <input type="file" name="certificadoCer" id="certificadoCer">
                                        </span>
                                            </div>
                                            <div class="btn-group" role="group">
                                                <input type="text" name="certificado" class="form-control">
                                            </div>
                                        </div>
                                        <!--fin file input -->
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="numeroCer">Numero de certificadp digital</label>
                                        <input type="text" class="form-control" id="numeroCer" name="numeroCer">
                                    </div>
                                    <div class="col-md-6"></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Archivo (.key)</label>
                                        <br>
                                        <!-- file input -->
                                        <div class="btn-group col-md-12" role="group">
                                            <div class="btn-group" role="group">
                                        <span class="btn btn-primary btn-file">
                                                Browse <input type="file" name="archivoKey" id="archivoKey">
                                        </span>
                                            </div>
                                            <div class="btn-group" role="group">
                                                <input type="text" name="archivoK" class="form-control">
                                            </div>
                                        </div>
                                        <!--fin file input -->
                                    </div>
                                    <div class="col-md-6">
                                        <label for="claveCSD">Clave CSD CANCELAR</label>
                                        <input type="text" id="claveCSD" name="claveCSD" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="row">
                                        <label for="">Archivo (.cer)</label>
                                        <br>
                                        <!-- file input -->
                                        <div class="btn-group col-md-12" role="group">
                                            <div class="btn-group" role="group">
                                        <span class="btn btn-primary btn-file">
                                                Browse <input type="file" name="archivoCer" id="archivoCer">
                                        </span>
                                            </div>
                                            <div class="btn-group" role="group">
                                                <input type="text" name="archivoC" class="form-control">
                                            </div>
                                        </div>
                                        <!--fin file input -->
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <textarea class="form-control" id="areaCer" name="areaCer"></textarea>
                                </div>
                            </div>


                            <div class="tab-pane fade" id="tab3default">
                                <div class="row">
                                    <input type="checkbox"> <label>Timbrar con webservice de pruebas</label>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="userTim">Usuario</label>
                                        <input type="text" name="userTimP" id="userTimP" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="passTimP">Contraseña</label>
                                        <input type="password" id="passTimP" name="passTimP" class="form-control">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <input type="checkbox"><label>Timbrar con webservice en linea</label>
                                </div>
                                <hr>
                                <div class="row">
                                    <label for="passTim">Contraseña</label>
                                    <input type="password" id="passTim" name="passTim" class="form-control">
                                </div>
                                <hr>
                                <hr>
                            </div>


                            <div class="tab-pane fade" id="tab4default">
                                <div class="row">
                                    <input type="checkbox" id="anexarXML" name="anexarXML"><label>Anexar a xml node Servicios parciales de construccion</label>
                                </div>
                            </div>


                            <div class="tab-pane fade" id="tab5default">
                                <div class="row">
                                    <input type="checkbox" id="enviarCorreos" name="enviarCorreos"><label>Siempre enviar correo
                                    electronico de las facturas impresas</label><br>
                                    <input type="checkbox" name="reciboArrendamiento" id="reciboArrendamiento"><label>Recibos
                                    de arrendamiento</label><br>
                                    <input type="checkbox" id="reciboHonorarios" name="reciboHonorarios"><label>Recibos de
                                    honorarios</label><br>
                                    <input type="checkbox" name="factServ" id="factServ"><label>Factura servicios profecionales</label><br>
                                    <input type="checkbox" id="recDon" name="recDon"><label>Recibo de Donativos</label><br>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="formDecimales">Formato de Decimales</label>
                                        <input type="text" name="formDecimales" id="formDecimales" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="retHosp">% Retencion de hospedaje</label>
                                        <input type="text" name="retHosp" id="retHosp" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="textIVA">Texto abierto I.V.A.</label>
                                        <input type="text" name="textIVA" id="textIVA" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="noAut">No. Autorización</label>
                                        <input type="text" class="form-control" name="noAut" id="noAut">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="fechaAut">Fecha de Autorización</label>
                                        <input type="date" name="fechaAut" id="fechaAut" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label for="leyenda">LEYENDA</label>
                                    <textarea name="leyenda" id="leyenda" class="form-control" rows="5"></textarea>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="retISR">Porcentaje de retencion de ISR</label>
                                        <input type="text" name="retISR" id="retISR" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="retIVA">Retencion de I.V.A.</label>
                                        <input type="text" name="retIVA" id="retIVA" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="retCed">Retencion cedular</label>
                                        <input type="text" name="retCed" id="retCed" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="checkbox" name="modIEX" id="modIEX"><label>Modo importa de Excel</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="checkbox" id="modIIN" name="modIIN"><label>Modo importa de Interbase</label>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <input type="checkbox" name="conector" id="conector"><label for="">Conector distinta base de datos Microsoft</label>
                                </div>
                                <div class="row">
                                    <label for="consulta">Consulta para Insertar</label>
                                    <textarea name="consulta" id="consulta" rows="5" class="form-control"></textarea>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="checkbox" name="ivaProd" id="ivaProd"><label for="">Aplica iva a precios de productos</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="checkbox" id="tresListas" name="tresListas"><label for="">Usar TRES listas de precios</label>
                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane fade" id="tab6default">
                                <input type="checkbox" id="remdes" name="remdes"><label>Utilizar remitente y destinatario (Configuracion para Transporte)</label>
                            </div>


                            <div class="tab-pane fade" id="tab7default">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="notEntidad">Entidad Federativa</label>
                                        <select name="notEntidad" id="notEntidad" class="selectpicker">
                                            <option value="00">Seleccione la Entidad Federativa</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="notCURP">CURP</label>
                                        <input type="text" id="notCURP" name="notCURP" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="notNo">Numero Notario(a)</label>
                                        <input type="number" name="notNo" id="notNo" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <label for="notAd">Adscipción</label>
                                    <input type="text" class="form-control" id="notAd" name="notAd">
                                </div>
                            </div>


                            <div class="tab-pane fade" id="tab8default">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="ivades">Descripcion</label>
                                        <br>
                                        <select name="ivades" id="ivades" class="selectpicker">
                                            <option value="00">Seleccione I.V.A.</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="ivaval">Valor</label>
                                        <input type="number" id="ivaval" name="ivaval" class="form-control" disabled="true">
                                    </div>
                                </div>
                                <br>
                                <h3><label>Tipo de Factor</label></h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="radio" name="ivatasa" id="ivatasa"><label> Tasa</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="radio" name="ivacuota" id="ivacuota"><label> Cuota</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="radio" name="ivaexento" id="ivaexento"><label> Exento</label>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="ivatable">
                                            <thead>
                                            <tr>
                                                <th>Clave</th>
                                                <th>Descripcion</th>
                                                <th>Valor</th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane fade" id="tab9default">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="iepsdes">Descripcion IEPS</label>
                                        <br>
                                        <select name="iepsdes" id="iepsdes" class="selectpicker">
                                            <option value="00">Seleccione IEPS</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="ivaval">Valor</label>
                                        <input type="number" id="iepsval" name="iepsval" class="form-control" disabled="true">
                                    </div>
                                </div>
                                <br>
                                <h3><label>Tipo de Factor</label></h3>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="radio" name="iepstasa" id="iepstasa"><label> Tasa</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="radio" name="iepscuota" id="iepscuota"><label> Cuota</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="radio" name="iepsexento" id="iepsexento"><label> Exento</label>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="iepstable">
                                            <thead>
                                            <tr>
                                                <th>Clave</th>
                                                <th>Descripcion</th>
                                                <th>Valor</th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane fade" id="tab10default">
                               <div class="row">
                                   <div align="right">
                                       <a href="#" class="btn btn-success" v-on:click="modalUnidad"><i class="fa fa-plus-square" aria-hidden="true"></i> Agregar Unidad de Medida</a>
                                   </div>
                               </div>
                                <hr>
                                <div class="row">
                                    <table id="unidadtable">
                                        <thead>
                                        <tr>
                                            <th>Clave</th>
                                            <th>Nombre</th>
                                            <th>Unidad SAT</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>


                            <div class="tab-pane fade" id="tab11default">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="claveMP">Clave metodo de pago</label>
                                        <input type="text" id="claveMP" name="claveMP" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="descMP">Descripcion</label>
                                        <input type="text" id="descMP" name="descMP" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <br>
                                        <a href="#" id="addMP" class="btn btn-success">Agregar</a>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <table id="tablaMP">
                                        <thead>
                                        <tr>
                                            <th>Clave</th>
                                            <th>Descripcion</th>
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>


                            <div class="tab-pane fade" id="tab12default">
                                <div class="row">
                                    <div align="right">
                                        <a href="#" class="btn btn-success" v-on:click="modalserie"><i class="fa fa-plus-square" aria-hidden="true"></i> Agregar Serie</a>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <table id="serietable">
                                        <thead>
                                        <tr>
                                            <th>Serie</th>
                                            <th>Descripcion</th>
                                            <th>Folio Inicial</th>
                                            <th>Folio Final</th>
                                            <th>Ultimo Folio</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- modal Unidad de Medida-->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" id="modalUnidad" role="dialog" aria-labelledby="Unidad de Medida">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Asociar Unidad de Medida SAT 3.3</h4>
                    </div>
                    <div class="content">
                        <form id="formUnidad">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="desUnidad">Descripcion</label>
                                    <input type="text" id="desUnidad" class="form-control" name="desUnidad">
                                </div>
                                <div class="col-md-6">
                                    <label for="desUSat">Descripcion SAT</label>
                                    <input type="text" name="desUSat" id="desUSat" class="form-control" disabled>
                                    <input type="hidden" name="idUSat" id="idUSat">
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="row">
                            <div>
                                <table id="unidadSATtable">
                                    <thead>
                                    <tr>
                                        <th>Clave Unidad</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" v-on:click="agregaUnidad">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal Serie Factura -->
        <div class="modal fade" tabindex="-1" role="dialog" id="modalseriefact">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Serie de Facturas</h4>
                    </div>
                    <div class="modal-body">
                        <form id="formSerieFacturas">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="serieSF">Serie</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="text" id="serieSF" name="serieSF" class="form-control">
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" id="descSF" name="descSF" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="folInSF">Folio Inicial</label>
                                    <input type="text" class="form-control" name="folInSF" id="folInSF">
                                </div>
                                <div class="col-md-4">
                                    <label for="folFiSF">Folio Final</label>
                                    <input type="text" class="form-control" name="folFiSF" id="folFiSF">
                                </div>
                                <div class="col-md-4">
                                    <label for="ulFolSF">Ultimo Folio</label>
                                    <input type="text" class="form-control" name="ulFolSF" id="ulFolSF">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="estadoSF">Estado</label>
                                    <select name="estadoSF" id="estadoSF" class="selectpicker" data-live-search="true"
                                    v-on:change="ciuSF">
                                        <option value="00">Seleccione un Estado</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="ciudadSF">Ciudad</label>
                                    <select name="ciudadSF" id="ciudadSF" class="selectpicker" data-live-search="true"
                                    v-on:change="locSF">
                                        <option value="00">Seleccione una Ciudad</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="localidadSF">Localidad</label>
                                    <select name="localidadSF" id="localidadSF" class="selectpicker" data-live-search="true">
                                        <option value="00">Seleccione una Localidad</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/vue/1.0.28/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/vue.resource/1.0.3/vue-resource.min.js"></script>

    <script type="text/javascript" src="http://cdn.jsdelivr.net/vue.table/1.5.3/vue-table.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
    <script src="{{asset("js/forms/configuraciones.js")}}"> </script>
@endsection