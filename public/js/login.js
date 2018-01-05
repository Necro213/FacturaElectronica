
var app = new Vue({
    el: '#log',
    data: {
        message: 'Hello Vue!!',
    },
    created:function(){

    },
    methods: {
        login: function () {
            data = new FormData(document.getElementById("loginForm"));
            $.ajax({
                url: document.location.protocol + '//' + document.location.host+"/doLogin",
                type: "POST",
                data: data,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).done(function (json) {
                if(json.code == 200){
                    swal("success", 'Sesion iniciada', json.detail).done(function () {
                        window.location.reload();
                    });
                }else{
                    swal("error", json.msg , json.detail);
                }
            }).fail(function (json) {
                swal("error", json.msg, "error");
            });
        }
    }
});