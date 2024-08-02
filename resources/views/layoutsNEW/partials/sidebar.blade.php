<div class="left-side-bar">
    <div class="brand-logo">
        <a href="index.html">
            <img src="{{ asset('vendors/images/deskapp-logo.svg') }}" alt="" class="dark-logo">
            <img src="{{ asset('vendors/images/deskapp-logo-white.svg') }}"alt="" class="light-logo">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll mCustomScrollbar _mCS_3"><div id="mCSB_3" class="mCustomScrollBox mCS-dark-2 mCSB_vertical mCSB_inside" style="max-height: none;" tabindex="0"><div id="mCSB_3_container" class="mCSB_container" style="position:relative; top:0; left:0;" dir="ltr">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="{{ route('home') }}" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-house"></span><span class="mtext">Inicio</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('archivo.list') }}" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-archive"></span><span class="mtext">Archivos</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle" data-option="off">
                        <span class="micon bi bi-receipt-cutoff"></span><span class="mtext"> Nomenclador </span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{route('cargo.list')}}">Cargo</a></li>
                        <li><a href="{{route('emisordestinatario.list')}}">Emisor destinatario</a></li>
                        <li><a href="{{route('posicion.list')}}">Posición en Archivo</a></li>
                        <li><a href="{{route('procedencia.list')}}">Procedencia o Destino</a></li>
                        <li><a href="{{route('listaarchivo.list')}}">Lista de Archivos ONBC</a></li>
                        <li><a href="{{route('provincia.list')}}">Provincia</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle" data-option="off">
                        <span class="micon bi bi-gear"></span><span class="mtext">Administración</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('usuarios.list') }}">Usuarios</a></li>
                        <li><a href="{{ route('configuracion.list') }}" >Configuarión</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>  
</div>
</div>



                