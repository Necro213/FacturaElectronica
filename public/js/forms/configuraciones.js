var vue = new Vue({
    el: '#app',
    data: {
        message: 'algo',
    },
    created:function () {
        id = $('#idUsuario').val();
        var ivatabla = $('#ivatable').dataTable();
        var iepstabla = $('#iepstable').dataTable();
        var unidadtabla = $('#unidadtable').dataTable({
           // 'scrollX': true,
            'scrollY': '600px',
            "processing": true,
            "serverSide": true,
            "ajax": document.location.protocol + '//' + document.location.host + '/UnidadDeMedida/'+id,
            columns: [
                {width: "10%",data: 'CVEUNI'},
                {width: "50%",data: 'NOMUNI'},
                {width: "40%",data: function (row) {
                        return row['CVEUNISAT'][0]['nom_uni'];
                    }
                }
            ],
            'language': {
                url: 'https://cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json',
                sLoadingRecords: '<span style="width:100%;"><img src="http://www.snacklocal.com/images/ajaxload.gif"></span>'
            }
        });
        var serietabla = $('#serietable').dataTable();
        var unidadSATtabla = $('#unidadSATtable').dataTable({
            //'scrollX': true,
            'scrollY': '300px',
            "processing": true,
            "serverSide": true,
            "ajax": document.location.protocol + '//' + document.location.host + '/getUnidadesSAT',
            columns: [
                {width: "15%",data: 'clave_unidad'},
                {width: "15%",data: 'nom_uni'},
                {width: "50%",data: 'des_uni'},
                {width: "20%",
                    data: function (row) {
                        str = '<div align="right">';
                        str += '<a class="btn btn-primary" onclick="vue.selAsociacion(\''+
                            row['clave_unidad']+'\',\''+row['nom_uni']+'\')">Seleccionar</a>';
                        str += '</div>';
                        return str;
                    }
                }
            ],
            'language': {
                url: 'https://cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json',
                sLoadingRecords: '<span style="width:100%;"><img src="http://www.snacklocal.com/images/ajaxload.gif"></span>'
            }
        });
        var MPtabla = $('#tablaMP').dataTable({
            destroy: true,
           // 'scrollX': true,
            'scrollY': '300px',
            "processing": true,
            "serverSide": true,
            "scrollCollapse": true,
            "ordering": true,
            "ajax": document.location.protocol + '//' + document.location.host + '/getMetodosPago',
            columns: [
                {width: "40%",data: 'FORPAG'},
                {width: "40%",data: 'DESFOR'},
                {width: "20%",
                    data: function (row) {
                        str = '<div align="right">';
                        str += '<a class="btn btn-primary" onclick="vue.selFormPag(\''+
                            row['FORPAG']+'\',\''+row['DESFOR']+'\')">Seleccionar</a>';
                        str += '</div>';
                        return str;
                    }
                }
            ],
            'language': {
                url: 'https://cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json',
                sLoadingRecords: '<span style="width:100%;"><img src="http://www.snacklocal.com/images/ajaxload.gif"></span>'
            },
            fixedHeader: {
                header: true,
                footer: true
            }
        });

        $.ajax({
            url : '/getEstados',
            type : 'GET',
            success : function(json) {
               if(json.code == 200){
                   data = json.msg;
                   data.forEach(function (item) {
                       $('#emiEst').append('<option value="'+item['TIPENT']+'">'+item['DESENT']+'</option>');
                       $('#notEntidad').append('<option value="'+item['TIPENT']+'">'+item['DESENT']+'</option>');
                       $('#estadoSF').append('<option value="'+item['TIPENT']+'">'+item['DESENT']+'</option>');
                   });
                   $('#emiEst').selectpicker('refresh');
                   $('#notEntidad').selectpicker('refresh');
                   $('#estadoSF').selectpicker('refresh');
               }
            },
            error : function(xhr, status) {
                alert('Disculpe, existió un problema');
            },
            complete : function(xhr, status) {
                console.log('Petición realizada');
            }
        });

        $.ajax({
            url : '/getRegimenFiscal',
            type : 'GET',
            success : function(json) {
                if(json.code == 200){
                    data = json.msg;
                    data.forEach(function (item) {
                        $('#emiRF').append('<option value="'+item['CVEREG']+'">'+item['DESREG']+'</option>');
                    });
                    $('#emiRF').selectpicker('refresh');
                }
            },
            error : function(xhr, status) {
                alert('Disculpe, existió un problema');
            },
            complete : function(xhr, status) {
                console.log('Petición realizada');
            }
        });

    },
    methods:{
        modalUnidad:function () {
            $('#modalUnidad').modal('show');
        },
        modalserie:function () {
            $('#modalseriefact').modal('show');
        },
        selAsociacion:function (id, name) {
            $('#desUSat').val(name);
            $('#idUSat').val(id);
        },
        selFormPag:function (id, name) {
            $('#claveMP').val(id);
            $('#descMP').val(name);
        },
        ciudades:function () {
            id = $('#emiEst option:selected').text();
            $.ajax({
                url : '/getCiudades/'+id,
                type : 'GET',
                success : function(json) {
                    if(json.code == 200){
                        data = json.msg;
                        $('#emiCiu option').remove();
                        $('#emiCiu').append('<option value="00">Seleccione una Ciudad</option>');
                        data.forEach(function (item) {
                            $('#emiCiu').append('<option value="'+item['CVEMUN']+'">'+item['DESMUN']+'</option>');
                        });
                        $('#emiCiu').selectpicker('refresh');
                    }
                },
                error : function(xhr, status) {
                    alert('Disculpe, existió un problema');
                },
                complete : function(xhr, status) {
                    console.log('Petición realizada');
                }
            });
        },
        localidades:function () {
            id = $('#emiCiu option:selected').text();
            $.ajax({
                url : '/getLocalidades/'+id,
                type : 'GET',
                success : function(json) {
                    if(json.code == 200){
                        data = json.msg;
                        $('#emiLoc option').remove();
                        $('#emiLoc').append('<option value="00">Seleccione una Localidad</option>');
                        data.forEach(function (item) {
                            $('#emiLoc').append('<option value="'+item['clave_col']+'">'+item['des_col']+'</option>');
                        });
                        $('#emiLoc').selectpicker('refresh');
                    }
                },
                error : function(xhr, status) {
                    alert('Disculpe, existió un problema');
                },
                complete : function(xhr, status) {
                    console.log('Petición realizada');
                }
            });
        },
        ciuSF:function () {
            id = $('#estadoSF option:selected').text();
            $.ajax({
                url : '/getCiudades/'+id,
                type : 'GET',
                success : function(json) {
                    if(json.code == 200){
                        data = json.msg;
                        $('#ciudadSF option').remove();
                        $('#ciudadSF').append('<option value="00">Seleccione una Ciudad</option>');
                        data.forEach(function (item) {
                            $('#ciudadSF').append('<option value="'+item['CVEMUN']+'">'+item['DESMUN']+'</option>');
                        });
                        $('#ciudadSF').selectpicker('refresh');
                    }
                },
                error : function(xhr, status) {
                    alert('Disculpe, existió un problema');
                },
                complete : function(xhr, status) {
                    console.log('Petición realizada');
                }
            });
        },
        locSF:function () {
            id = $('#ciudadSF option:selected').text();
            $.ajax({
                url : '/getLocalidades/'+id,
                type : 'GET',
                success : function(json) {
                    if(json.code == 200){
                        data = json.msg;
                        $('#localidadSF option').remove();
                        $('#localidadSF').append('<option value="00">Seleccione una Localidad</option>');
                        data.forEach(function (item) {
                            $('#localidadSF').append('<option value="'+item['clave_col']+'">'+item['des_col']+'</option>');
                        });
                        $('#localidadSF').selectpicker('refresh');
                    }
                },
                error : function(xhr, status) {
                    alert('Disculpe, existió un problema');
                },
                complete : function(xhr, status) {
                    console.log('Petición realizada');
                }
            });
        },
        agregaUnidad:function () {
            var data = new FormData(document.getElementById("formUnidad"));
            id = $('#idUsuario').val();
            console.log(id);
            $.ajax({
                url:document.location.protocol+'//'+document.location.host  +"/config/"+id+"/newUnidad",
                type:"POST",
                data: data,
                contentType:false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).done(function(json){
                if(json.code == 200) {
                    swal("Realizado", json.msg, json.detail);
                    $('#modalUnidad').modal("hide");
                    $('#unidadtable').dataTable().api().ajax.reload(null,false);
                }else{
                    swal("Error",json.msg,json.detail);
                }
            }).fail(function(){
                swal("Error","Tuvimos un problema de conexion","error");
            });
        },
        agregaSerieFactura:function () {
            var data = new FormData(document.getElementById("formSerieFacturas"));
            id = $('#idUsuario').val();
            $.ajax({
                url:document.location.protocol+'//'+document.location.host  +"/config/"+id+"/newSerieFact",
                type:"POST",
                data: data,
                contentType:false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).done(function(json){
                if(json.code == 200) {
                    swal("Realizado", json.msg, json.detail);
                    $('#modalseriefact').modal("hide");
                    $('#serietable').dataTable().api().ajax.reload(null,false);
                }else{
                    swal("Error",json.msg,json.detail);
                }
            }).fail(function(){
                swal("Error","Tuvimos un problema de conexion","error");
            });
        }
    }
});
