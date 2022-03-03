<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo') - SiempreColgados</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    {{-- Styles --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="{{ asset('app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/tareas.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>




</head>

<body>

    {{-- HEADER --}}
    @yield('header')
    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">


                @if (auth()->user()->esAdministrador())
                    <a href="{{ route('tareas.index') }}"
                        class="d-flex me-4 align-items-center mb-lg-0 text-white text-decoration-none h4">
                        SiempreColgados
                    </a>

                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="{{ route('tareasNoAsignadas.index') }}" class="nav-link px-2 text-white">Tareas sin
                                asignar</a></li>
                        <li><a href="{{ url('tareas') }}" class="nav-link px-2 text-white">Tareas</a></li>
                        <li><a href="{{ url('clientes') }}" class="nav-link px-2 text-white">Clientes</a></li>
                        <li><a href="{{ url('empleados') }}" class="nav-link px-2 text-white">Empleados</a></li>
                        <li><a href="{{ url('cuotas') }}" class="nav-link px-2 text-white">Cuotas</a></li>
                        <li><a href="{{ route('empleadosJS.index') }}" class="nav-link px-2 text-white">Empleados
                                JS</a></li>
                    </ul>
                @else
                    <a href="{{ route('operario.index') }}"
                        class="d-flex me-4 align-items-center mb-lg-0 text-white text-decoration-none h4">
                        SiempreColgados
                    </a>
                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="{{ route('operario.index') }}" class="nav-link px-2 text-white">Inicio</a></li>
                    </ul>
                @endif

                <a href="{{ route('perfil.index') }}" class="nav-link px-2 text-white">

                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        <path fill-rule="evenodd"
                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                    </svg>&nbsp;

                    User: {{ Auth::user()->nombre }} ({{ Auth::user()->descripcionTipo() }}) &nbsp;&nbsp;

                </a>

                <a class="nav-link px-2 btn btn-warning text-dark" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>


            </div>
        </div>
    </header>

    {{-- CONTENIDO --}}
    <div class="container" id="contenido">
        @yield('contenido')
    </div>



</body>

</html>
