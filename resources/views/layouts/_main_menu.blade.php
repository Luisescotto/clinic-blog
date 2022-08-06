<div class="main-menu badge-pill">
    <nav id="mobile-menu">
        <ul>
            <li class="{!! active_class(route('web.welcome')) !!}">
                <a  href="{{route('web.welcome')}}">
                    <i class="fa fa-home"></i> Inicio
                </a>
            </li>

            <li class="{!! active_class(route('web.shop_grid')) !!}">
                    <a  href="{{route('web.shop_grid')}}">
                        Tienda
                    </a>
            </li>

            <li class="{!! active_class(route('web.blog')) !!}">
                <a  href="{{route('web.blog')}}">
                    Blog
                </a>
            </li>

            <li class="{!! active_class(route('web.about_us')) !!}">
                <a  href="{{route('web.about_us')}}">
                    Sobre nosotros
                </a>
            </li>

            <li class="{!! active_class(route('web.contact_us')) !!}">
                <a  href="{{route('web.contact_us')}}">
                    Contáctanos
                </a>
            </li>
        </ul>
    </nav>
</div>