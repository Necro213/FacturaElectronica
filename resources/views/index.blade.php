@extends('/layout/admin')

@section('styles')
    <link rel="stylesheet" href="{{asset('/css/menubar.css')}}">
@endsection

@section('content')
    <div id="app">
        <h1>@{{ message }}</h1>

        <button class="btn btn-primary" v-on:click="cambiaAlgo">cambia mensaje</button>
    </div>
@endsection

@section('scripts')
    <script src="{{asset("/js/index.js")}}"> </script>
@endsection