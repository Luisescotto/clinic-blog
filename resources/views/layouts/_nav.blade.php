<body class="sidebar-fixed">
    

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                {{-- <div class="profile-image">
                    <img src="{{asset('melody/images/faces/face16.jpg')}}" alt="image" />
                </div> --}}
                <!-- <div class="profile-name">
                    <p class="name">
                        {{ Auth::user()->name }}
                    </p>
                    <p class="designation">
                        {{ Auth::user()->email }}
                    </p>
                </div> -->
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}">
                <i class="fa fa-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('reports.date')}}">
                <i class="fa fa-file-alt menu-icon"></i>
                <span class="menu-title">Reportes</span>
            </a>
        </li>

        {{-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts1" aria-expanded="false"
                aria-controls="page-layouts">
                <i class="fas fa-chart-line menu-icon"></i>
                <span class="menu-title">Reportes</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts1">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="{{route('reports.day')}}">Reportes por día</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('reports.date')}}">Reportes por fecha</a>
                    </li>
                </ul>
            </div>
        </li> --}}

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#inventario" aria-expanded="false"
                aria-controls="inventario">
                <i class="fas fa-boxes menu-icon"></i>
                <span class="menu-title">Inventario</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="inventario">
                <ul class="nav flex-column sub-menu">

                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="{{route('products.index')}}">
                            <i class="fas fa-box menu-icon"></i>
                            <span class="menu-title">Productos</span>
                        </a>
                    </li>

                    

                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="{{route('purchases.index')}}">
                            <i class="fas fa-cart-plus menu-icon"></i>
                            <span class="menu-title">Compras</span>
                        </a>
                    </li>

                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="{{route('sales.index')}}">
                            <i class="fas fa-shopping-cart menu-icon"></i>
                            <span class="menu-title">Ventas</span>
                        </a>
                    </li>

                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="{{route('orders.index')}}">
                            <i class="fas fa-shipping-fast menu-icon"></i>
                            <span class="menu-title">Pedidos</span>
                        </a>
                    </li>

                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="{{route('categories.index')}}">
                            <i class="fas fa-tags menu-icon"></i>
                            <span class="menu-title">Categorías</span>
                        </a>
                    </li>

                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="{{route('tags.index')}}">
                            <i class="fas fa-tag menu-icon"></i>
                            <span class="menu-title">Etiquetas</span>
                        </a>
                    </li>

                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#Ecommerce" aria-expanded="false"
                aria-controls="Ecommerce">
                <i class="fas fa-boxes menu-icon"></i>
                <span class="menu-title">Ecommerce</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Ecommerce">
                <ul class="nav flex-column sub-menu">

                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="{{route('social_medias.index')}}">
                            <span class="menu-title">Redes sociales</span>
                        </a>
                    </li>

                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="{{route('sliders.index')}}">
                            <span class="menu-title">Sliders</span>
                        </a>
                    </li>

                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="{{route('subscriptions.index')}}">
                            <span class="menu-title">Suscripciones</span>
                        </a>
                    </li>

                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="{{route('promotions.index')}}">
                            <span class="menu-title">Promociones</span>
                        </a>
                    </li>
        
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#Blog" aria-expanded="false"
                aria-controls="Blog">
                <i class="fas fa-edit menu-icon"></i>
                <span class="menu-title">Blog</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="Blog">
                <ul class="nav flex-column sub-menu">

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('posts.index')}}">
                            <span class="menu-title">Pubicaciones</span>
                        </a>
                    </li>
        
                </ul>
            </div>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="{{route('clients.index')}}">
                <i class="fas fa-users menu-icon"></i>
                <span class="menu-title">Clientes</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('providers.index')}}">
                <i class="fas fa-shipping-fast menu-icon"></i>
                <span class="menu-title">Proveedores</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('guests.index')}}">
                <i class="fas fa-user-tie menu-icon"></i>
                <span class="menu-title">Invitados</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('brands.index')}}">
                <i class="fas fa-trademark menu-icon"></i>
                <span class="menu-title">Marcas</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('users.index')}}">
                <i class="fas fa-user-tag menu-icon"></i>
                <span class="menu-title">Usuarios</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('roles.index')}}">
                <i class="fas fa-user-cog menu-icon"></i>
                <span class="menu-title">Roles</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false"
                aria-controls="page-layouts">
                <i class="fas fa-cogs menu-icon"></i>
                <span class="menu-title">Configuración</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="{{route('business.index')}}">Empresa</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{route('printers.index')}}">Impresora</a>
                    </li> --}}
                </ul>
            </div>
        </li>
    </ul>
</nav>

</body>
