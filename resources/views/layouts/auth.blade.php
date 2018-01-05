<!DOCTYPE html>
<html>

@include('layouts.partials.htmlheader')

@yield('content')


<script src="{{asset('/js/vue.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.4.4/sweetalert2.min.js" type="text/javascript"></script>
@yield('scripts')
</html>