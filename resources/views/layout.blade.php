<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo') - Nosecaen S.L.</title>
    <script
			  src="https://code.jquery.com/jquery-3.6.0.js"
			  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
			  crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name', 'Laravel')}}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="{{asset('js/tareas.js')}}"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" rel="stylesheet" >
    <link href="{{asset('app.css')}}" rel="stylesheet" >


</head>
<body>

    {{-- HEADER --}}
    @yield('header')
    <header class="p-3 bg-dark text-white">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex me-4 align-items-center mb-lg-0 text-white text-decoration-none h4">
              Nosecaen S.L.
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a href="#" class="nav-link px-2 text-secondary">Inicio</a></li>
              <li><a href="{{ url('tareas')}}" class="nav-link px-2 text-white">Tareas</a></li>
              <li><a href="{{ url('clientes')}}" class="nav-link px-2 text-white">Clientes</a></li>
              <li><a href="{{ url('empleados')}}" class="nav-link px-2 text-white">Empleados</a></li>
              <li><a href="{{ url('cuotas')}}" class="nav-link px-2 text-white">Cuotas</a></li>
              <li>
                <a class="nav-link px-2 btn btn-warning text-dark" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

                </li>
            </ul>
          </div>
        </div>
      </header>

    {{-- CONTENIDO --}}
    <div class="container" id="contenido">
        @yield('contenido')
    </div>



</body>

</html>
