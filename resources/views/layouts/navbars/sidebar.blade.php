<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('img/brand/4.gif') }}" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="https://www.sackettwaconia.com/wp-content/uploads/default-profile.png">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Cerrar Sesión') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('img/brand/cbc.png') }}">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Navigation -->
            <ul class="navbar-nav">
                
                <!-- Ordenes -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#navbar-ordenes" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-ordenes">
                        <i class="ni ni-cart" style="color: #f4645f;"></i>
                        <span class="nav-link-text">Ordenes</span>
                    </a>
                    <div class="collapse" id="navbar-ordenes">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{!! url('/tipo-permisos'); !!}">
                                    Agregar Orden
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{!! url('/tipo-permisos/create'); !!}">
                                    Ver Ordenes
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- Productos -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#navbar-productos" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-productos">
                        <i class="ni ni-laptop" style="color: #79C142;"></i>
                        <span class="nav-link-text">Productos</span>
                    </a>
                    <div class="collapse" id="navbar-productos">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{!! url('/clientes/create'); !!}">
                                    Agregar Producto
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{!! url('/clientes-liquidar'); !!}">
                                    Ver Producto
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- Proveedores -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#navbar-proveedores" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-proveedores">
                        <i class="ni ni-briefcase-24" style="color: green"></i>
                        <span class="nav-link-text">Proveedores</span>
                    </a>
                    <div class="collapse" id="navbar-proveedores">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{!! url('/clientes/create'); !!}">
                                    Agregar Proveedor
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{!! url('/clientes-liquidar'); !!}">
                                    Ver Proveedores
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{!! url('/clientes-liquidar'); !!}">
                                    Nueva Compra
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- Marcas -->
                <li class="nav-item">
                    <a class="nav-link " href="/marcas">
                    <i class="ni ni-tablet-button"></i> Marcas
                    </a>
                </li>
                <!-- Categoria -->
                <li class="nav-item">
                    <a class="nav-link " href="/categorias">
                    <i class="ni ni-tablet-button"></i> Categoría
                    </a>
                </li>
                <!-- Reporte -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#navbar-reportes" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-reportes">
                        <i class="ni ni-chart-pie-35" style="color: #79C142;"></i>
                        <span class="nav-link-text">Reportes</span>
                    </a>
                    <div class="collapse" id="navbar-reportes">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Reporte
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- Usuarios -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#navbar-usuarios" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-usuarios">
                        <i class="ni ni-single-02" style="color: #009688;"></i>
                        <span class="nav-link-text">Usuarios</span>
                    </a>
                    <div class="collapse" id="navbar-usuarios">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{!! url('/usuarios'); !!}">
                                    Consultar Usuarios
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{!! url('/usuarios/create'); !!}">
                                    Agregar Usuario
                                </a>
                            </li>
                            <hr class="my-2">
                            <li class="nav-item">
                                <a class="nav-link" href="{!! url('/roles'); !!}">
                                    Consultar Roles
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{!! url('/roles/create'); !!}">
                                    Agregar Rol
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- Cerrar Sesion -->
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="ni ni-user-run"></i>
                            <span>{{ __('Cerrar Sesión') }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
