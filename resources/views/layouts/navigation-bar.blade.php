<!-- Barra de navegacion -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-tools"></i>
                    Configuración
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    @can('escuelas.index')
                        <a class="dropdown-item" href="{{ route('escuelas.index') }}">Escuelas</a>
                        <div class="dropdown-divider"></div>
                    @endcan
                    @can('ciclos.index')
                        <a class="dropdown-item" href="{{ route('ciclos.index') }}">Ciclos Escolares</a>
                        <div class="dropdown-divider"></div>
                    @endcan
                    <a class="dropdown-item" href="#">Grados Escolares</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Grupos Escolares</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Cuotas de Inscripción</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Cuotas de Colegiatura</a>
                </div>
            </li>
        </ul>
        <div class="dropdown">
            <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="far fa-user-circle"></i>
                <span class="font-weight-light">{{ Auth::user()->name }}</span>

            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">
                    <i class="far fa-user text-success"></i> <span class="font-weight-light">Mi Perfil</span>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-key text-info"></i> <span class="font-weight-light">Cambiar Password</span>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt text-danger"></i> <span class="font-weight-light">
                        {{ __('Salir') }}
                    </span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</nav>
