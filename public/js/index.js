var app = new Vue({
    el: '#app',
    data: {
        message: 'Hello Vue!!'
    },
    methods:{
        cambiaAlgo: function () {
            this.message = "nuevo mensaje";
        }
    }
});