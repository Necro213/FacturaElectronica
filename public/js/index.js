

var app = new Vue({
    el: '#app',
    data: {
        message: 'Hello Vue!!',
    },
    created:function(){
        var tabla= $('#tabla').DataTable({
            'scrollX':true,
            'scrollY':'600px',
            "processing": true,
            "serverSide": true,
            "ajax": document.location.protocol+'//'+document.location.host  +'/getUsers',
            "columnDefs": [
                { "width": "16%", "targets": [0,1,2,3,4,5]}
            ],
            columns: [
                {data:function (row) {
                        return row['nombre']+' '+row['ap_pat']+' '+row['ap_mat'];
                    }},
                {data: 'username'},
                {data: 'level'},
                {data: 'status'},
                {data: 'idReferencia'},
                {data: function () {
                        return "algo";
                    }}
            ],
            'language': {
                url:'https://cdn.datatables.net/plug-ins/1.10.13/i18n/Spanish.json',
                sLoadingRecords : '<span style="width:100%;"><img src="http://www.snacklocal.com/images/ajaxload.gif"></span>'
            }
        });
    },
    methods:{
        modalShow: function () {
            $('#modalUsr').modal('show');
        },
        addUser: function () {
            data = new FormData(document.getElementById("formUsr"));
            $.ajax({
                url: document.location.protocol + '//' + document.location.host+"/addUser",
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
                    $('#tabla').dataTable().api().ajax.reload();
                } else {
                    swal("error", json.msg, json.detail);
                }
            }).fail(function () {
                swal("error", "Tuvimos un problema de conexion", "error");
            });
        }
    }
});
