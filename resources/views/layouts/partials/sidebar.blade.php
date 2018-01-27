<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li>
            @if($nivel == 0 || $nivel == 1)
            <li><a href="{{route('usuarios.view')}}"><i class="fa fa-user" aria-hidden="true"></i> <span>Usuarios</span></a></li>
            @else
            <li><a href="{{route('productos.view')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span>Productos</span></a></li>
            <li><a href="{{route('clientes.view')}}"><i class="fa fa-users" aria-hidden="true"></i> <span>Clientes</span></a></li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-link"></i> <span>Facturas</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right" id="icon"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route('facturas.view')}}"><i class="fa fa-file-text" aria-hidden="true"></i> <span>Factura</span></a></li>
                    </ul>
                </li>
                <script>
                    $('.treeview').on('click',function () {
                        if($('.treeview').val() == true){
                            $('#icon').removeClass('fa-angle-down');
                            $('#icon').addClass('fa-angle-left');
                            $('.treeview').removeClass('active');
                            $('.treeview').removeClass('menu-open');
                            $('.treeview').val(false);
                        }else{
                            $('#icon').removeClass('fa-angle-left');
                            $('#icon').addClass('fa-angle-down');
                            $('.treeview').addClass('active');
                            $('.treeview').addClass('menu-open');
                            $('.treeview').val(true);
                        }
                    })
                </script>
            @endif

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
