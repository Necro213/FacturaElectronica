var app = new Vue({
    el: '#app',
    data: {
        message: 'Usuarios',
        table : '',
        filtro: ''
    },
    created: function () {
        var tabla = $('#tabla').DataTable({
            'scrollX': true,
            'scrollY': '600px',
            "processing": true,
            "serverSide": true,
            "ajax": document.location.protocol + '//' + document.location.host + '/getUsers',
            "columnDefs": [
                {"width": "20%", "targets": [0, 1, 2, 4]},
                {"width": "15%", "targets": [5]}
            ],
            columns: [
                {
                    data: function (row) {
                        return row['nombre'] + ' ' + row['ap_pat'] + ' ' + row['ap_mat'];
                    }
                },
                {data: 'username'},
                {data: 'level'},
                {data: 'status'},
                {data: 'idReferencia'},
                {
                    data: function (row) {
                        str = '<div align="right">';
                        str += (row['level'] == 2) ? '<a class="btn btn-warning" onclick="app.configurar('+row['id']+')"><i class="fa fa-cogs" aria-hidden="true"></i></a>': '';
                        str += (row['level'] != 0) ? '<a class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>':'';
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
            //this.clear();
            $('#modalPro').modal('show');
        },
        selAsociacion:function (id, name) {
            $('#agrupaPro').val(id);
            $('#agrupaProDes').val(name);
        },
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
        }
    }
});
