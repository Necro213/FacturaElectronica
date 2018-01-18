var app = new Vue({
    el: '#app',
    data: {
        message: 'Usuarios',
        table : '',
        filtro: ''
    },
    created: function () {
        id = $("#idUsuario").val();
        var tabla = $('#tablaProd').DataTable({
            'scrollX':true,
            'scrollY': '500px',
            "processing": true,
            "serverSide": true,
            "ajax": document.location.protocol + '//' + document.location.host + '/products/'+id,
            'createdRow':function(row,data,index){
                $('tr', row).addClass("success");
            },
            columns: [
                {data: 'CVEPROSAT'},
                {data: 'DESPRO'},
                {data: 'NOMUNI'},
                {data: 'CVEUNISAT'},
                {data: 'DESPROSAT'},
                {data: 'VALTAS'},
                {data: 'VALIEP'},
                {data: function (row) {
                        return row['FECPRO'].substr(0,10);
                    }},
                {data: 'PR1PRO'},
                {data: 'PR2PRO'},
                {data: 'PR3PRO'},
                {data: function (row) {
                    id = row['CVEPRO'];
                    str = '<div>';
                    str+= '<a class="btn btn-primary btn-sm" onclick="app.modalEdit('+id+'' +
                        ',\''+row['DESPRO']+'\'' +
                        ',\''+row['UNIPRO']+'\'' +
                        ',\''+row['CVETAS']+'\'' +
                        ',\''+row['CVEIEP']+'\'' +
                        ',\''+row['PR1PRO']+'\'' +
                        ',\''+row['PR2PRO']+'\'' +
                        ',\''+row['PR3PRO']+'\'' +
                        ',\''+row['CODBAR']+'\'' +
                        ',\''+row['FECPRO']+'\'' +
                        ',\''+row['CVEPROSAT']+'\'' +
                        ')">' +
                        '<i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>';
                    str+= '<a class="btn btn-danger btn-sm" onclick="app.deleteProduct('+id+')">' +
                        '<i class="fa fa-trash-o" aria-hidden="true"></i></a>';
                    str+= '</div>';
                        return str;
                    }
                }
            ],
            'language': {
                url: 'https://cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json',
                sLoadingRecords: '<span style="width:100%;"><img src="http://www.snacklocal.com/images/ajaxload.gif"></span>'
            }
        });
        this.table = $('#tablaProSAT').DataTable({
                'scrollX': true,
                'scrollY': '200px',
                "processing": true,
                "serverSide": true,
                "searching": false,
                "ajax": document.location.protocol + '//' + document.location.host + '/getSerSAT/allproducts',
                "columnDefs": [
                    {"width": "40%", "targets": [0, 1, 2]}
                ],
                columns: [
                    {data: 'CVEPROSAT'},
                    {data: 'DESPROSAT'},
                    {
                        data: function (row) {
                            str = '<div align="right">';
                            str += '<a class="btn btn-primary" onclick="app.selAsociacion('+
                                row['CVEPROSAT']+',\''+row['DESPROSAT']+'\')">Seleccionar</a>';
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
        //optener iva
        $.ajax({
            url : '/getIva',
            type : 'GET',
            success : function(json) {
                if(json.code == 200){
                    data = json.msg;
                    data.forEach(function (item) {
                        $('#ivaPro').append('<option value="'+item['CVETAS']+'">'+item['DESTAS']+'</option>');
                    });
                    $('#ivaPro').selectpicker('refresh');
                }
            },
            error : function(xhr, status) {
                alert('Disculpe, existió un problema');
            },
            complete : function(xhr, status) {
                console.log('Petición realizada');
            }
        });
        //obtener ieps
        $.ajax({
            url : '/getIeps',
            type : 'GET',
            success : function(json) {
                if(json.code == 200){
                    data = json.msg;
                    data.forEach(function (item) {
                        $('#iepsPro').append('<option value="'+item['CVEIEP']+'">'+item['DESIEP']+'</option>');
                    });
                    $('#iepsPro').selectpicker('refresh');
                }
            },
            error : function(xhr, status) {
                alert('Disculpe, existió un problema');
            },
            complete : function(xhr, status) {
                console.log('Petición realizada');
            }
        });
        //obtener tipos de unidadd
        $.ajax({
            url : '/getTipoUnidad',
            type : 'GET',
            success : function(json) {
                if(json.code == 200){
                    data = json.msg;
                    data.forEach(function (item) {
                        $('#TUPro').append('<option value="'+item['CVEUNI']+'">'+item['NOMUNI']+'</option>');
                    });
                    $('#TUPro').selectpicker('refresh');
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
            this.clear();
            $('#modalPro').modal('show');
        },//fin modalShow
        selAsociacion:function (id, name) {
            $('#agrupaPro').val(id);
            $('#agrupaProDes').val(name);
        }, //fin selAsociacion
        filtrar:function () {
           this.table.destroy();
             filtrotab = (this.filtro == '') ? 'allproducts':this.filtro.replace(' ','-');
            this.table = $('#tablaProSAT').DataTable({
                'scrollX': true,
                'scrollY': '200px',
                "processing": true,
                "serverSide": true,
                "searching": false,
                "ajax": document.location.protocol + '//' + document.location.host + '/getSerSAT/'+ filtrotab,
                "columnDefs": [
                    {"width": "40%", "targets": [0, 1, 2]}
                ],
                columns: [
                    {data: 'CVEPROSAT'},
                    {data: 'DESPROSAT'},
                    {
                        data: function (row) {
                            str = '<div align="right">';
                            str += '<a class="btn btn-primary" onclick="app.selAsociacion('+
                                row['CVEPROSAT']+',\''+row['DESPROSAT']+'\')">Seleccionar</a>';
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
        },//fin filtrar
        newProduct: function () {
            data = new FormData(document.getElementById("formProd"));
            $.ajax({
                url: document.location.protocol + '//' + document.location.host + "/product/new",
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
                    $('#modalPro').modal("hide");
                    this.clear();
                    $('#tablaProd').dataTable().api().ajax.reload();
                } else {
                    swal("error", json.msg, json.detail);
                }
            }).fail(function () {
                swal("error", "Tuvimos un problema de conexion", "error");
            });
        },//fin new product
        modalEdit: function (id,descripcion,tunidad,iva,ieps,pr1,pr2,pr3,cod,fec,agrupa) {
            $('#descPro').val(descripcion);
            $('#TUPro').val(tunidad);
            $('#ivaPro').val(iva);
            $('#iepsPro').val(ieps);
            $('#pr1Pro').val(pr1);
            $('#pr2Pro').val(pr2);
            $('#pr3Pro').val(pr3);
            $('#codPro').val(cod);
            $('#fecPro').val(fec);
            $('#agrupaPro').val(agrupa);
            $('#idpr').val(id);
            $('#agrupaProDes').val('');
            $('#filtratabla').val('');
            $('#modalPro').modal('show');
        },
        editProduct:function (id) {
            alert('Editar '+id)
        },//fin editProduct
        deleteProduct:function (id) {
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
                ruta =  document.location.protocol + '//' + document.location.host+'/productos/delete/'+ id;
                $.ajax({
                    url: ruta,
                    type: 'delete',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                }).done(function (json) {
                    if (json.code == 200) {
                        swal("Realizado", json.msg, json.detail);
                        $('#tablaProd').dataTable().api().ajax.reload();
                    } else {
                        swal("Error", json.msg, json.detail);
                    }
                }).fail(function (response) {
                    swal("Error", "tuvimos un problema", "warning");
                });
            });
        },//fin deleteProduct
        clear: function () {
            $('#descPro').val('');
            $('#TUPro').val(00);
            $('#ivaPro').val(00);
            $('#iepsPro').val(00);
            $('#pr1Pro').val('');
            $('#pr2Pro').val('');
            $('#pr3Pro').val('');
            $('#codPro').val('');
            $('#fecPro').val(new Date());
            $('#agrupaPro').val('');
            $('#agrupaProDes').val('');
            $('#filtratabla').val('');
            $('#idpr').val('');
        }
    }
});
