var app = new Vue({
    el: '#app',
    data: {
        message: 'Usuarios',
        options: [{
                    value: 0,
                    text: 'Seleccione el Tipo de Usuario'
            },{
                    value: 1,
                    text: 'Administrador'
            },{
                value: 2,
                text: 'Contribuyente'
            }
        ],
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

    },
    methods: {
        modalShow: function () {
            this.clear();
            $('#modalUsr').modal('show');
        },//fin modalShow
        addUser: function () {
            data = new FormData(document.getElementById("formUsr"));
            $.ajax({
                url: document.location.protocol + '//' + document.location.host + "/addUser",
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
                    $('#modalUsr').modal("hide");
                    this.clear();
                    $('#tabla').dataTable().api().ajax.reload();
                } else {
                    swal("error", json.msg, json.detail);
                }
            }).fail(function () {
                swal("error", "Tuvimos un problema de conexion", "error");
            });
        },//fin addUser
        clear:function () {
            $('#name').val('');
            $('#ap_pat').val('');
            $('#ap_mat').val('');
            $('#username').val('');
            $('#tipo').val(0);
            $('#pass').val('');
            $('#pass2').val('');
        },//end clear
        configurar:function (id) {
            return location.replace('/usuarios/config/'+id);
        }
    }
});
