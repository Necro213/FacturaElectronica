var app = new Vue({
    el: '#app',
    data: {
        message: 'Clientes'
    },
    created: function () {
        var tabla = $('#tabla').DataTable();
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
        verPDF:function () {
            //var data = new FormData(document.getElementById("formUnidad"));
            $.ajax({
                url:document.location.protocol+'//'+document.location.host+""  +"/factura/ver",
                type:"get",
                data: {'maestro':'jj'},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).done(function(json){

            }).fail(function(){
                swal("Error","Tuvimos un problema de conexion","error");
            });
        }
    }
});
