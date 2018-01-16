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
        }
    }
});
