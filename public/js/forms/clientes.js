var app = new Vue({
    el: '#app',
    data: {
        message: 'Clientes',
        userid : ''
    },
    created: function () {
        this.userid = $('#id').val();
        id = $('#id').val();
        var tabla = $('#tabla').DataTable({
            'scrollX': true,
            'scrollY': '500px',
            "processing": true,
            "serverSide": true,
            "searching": false,
            "ajax": document.location.protocol + '//' + document.location.host + '/getClientes/'+id,
            "columnDefs": [
                {"width": "40%", "targets": [0, 1, 2]}
            ],
            columns: [
                {data: 'DESCLI'},
                {data: 'CALCLI'},
                {data: 'NUMCLI'},
                {data: 'COLCLI'},
                {data: 'CIUCLI'},
                {data: 'EDOCLI'},
                {
                    data: function (row) {
                        str = '<div align="right">';
                        str += '<a class="btn btn-danger btn-sm" onclick="app.delete('+row['CVECLI']+')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>';
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
        $.ajax({
            url : '/getEstados',
            type : 'GET',
            success : function(json) {
                if(json.code == 200){
                    data = json.msg;
                    data.forEach(function (item) {
                        $('#estCli').append('<option value="'+item['TIPENT']+'">'+item['DESENT']+'</option>');
                    });
                    $('#estCli').selectpicker('refresh');
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
            url : '/getUsoCfdi',
            type : 'GET',
            success : function(json) {
                if(json.code == 200){
                    data = json.msg;
                    data.forEach(function (item) {
                        console.log(item['CVEUSO']);
                        $('#usoCli').append('<option value="'+item['CVEUSO']+'">'+item['DESUSO']+'</option>');
                    });
                    $('#usoCli').selectpicker('refresh');
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
    methods: {
        modalShow: function () {
            //this.clear();
            $('#modalCli').modal('show');
        },
        selAsociacion:function (id, name) {
            $('#agrupaPro').val(id);
            $('#agrupaProDes').val(name);
        },
        ciudades:function () {
            id = $('#estCli option:selected').text();
            $.ajax({
                url : '/getCiudades/'+id,
                type : 'GET',
                success : function(json) {
                    if(json.code == 200){
                        data = json.msg;
                        $('#ciuCli option').remove();
                        $('#ciuCli').append('<option value="00">Seleccione una Ciudad</option>');
                        data.forEach(function (item) {
                            $('#ciuCli').append('<option value="'+item['CVEMUN']+'">'+item['DESMUN']+'</option>');
                        });
                        $('#ciuCli').selectpicker('refresh');
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
            id = $('#ciuCli option:selected').text();
            $.ajax({
                url : '/getLocalidades/'+id,
                type : 'GET',
                success : function(json) {
                    if(json.code == 200){
                        data = json.msg;
                        $('#locCli option').remove();
                        $('#locCli').append('<option value="00">Seleccione una Localidad</option>');
                        data.forEach(function (item) {
                            $('#locCli').append('<option value="'+item['clave_col']+'">'+item['des_col']+'</option>');
                        });
                        $('#locCli').selectpicker('refresh');
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
        addClient:function () {
            data = new FormData(document.getElementById("formCli"));
            $.ajax({
                url: document.location.protocol + '//' + document.location.host + "/client/new",
                type: "POST",
                data: data,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).done(function (json) {
                if (json.code == 200) {
                    swal("Realizado", json.msg, json.detail);
                    $('#modalCli').modal("hide");
                    this.clear();
                    $('#tabla').dataTable().api().ajax.reload();
                } else {
                    swal("error", json.msg, json.detail);
                }
            }).fail(function () {
                swal("error", "Tuvimos un problema de conexion", "error");
            });
        },
        delete:function (id) {
            swal({
                title: '¿Estás seguro?',
                text: "Esto no se puede revertir!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, deseo eliminarlo!',
                cancelButtonText: "Lo pensaré"
            }).then(function () {
                ruta =  document.location.protocol + '//' + document.location.host+'/cliente/delete/'+ id;
                $.ajax({
                    url: ruta,
                    type: 'delete',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                }).done(function (json) {
                    if (json.code == 200) {
                        swal("Realizado", json.msg, json.detail);
                        $('#tabla').dataTable().api().ajax.reload();
                    } else {
                        swal("Error", json.msg, json.detail);
                    }
                }).fail(function (response) {
                    swal("Error", "tuvimos un problema", "warning");
                });
            });
        }
    }
});
