<!doctype html>
<html lang="en">
<head>
    <!-- resources/css -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    <!-- Icons fontawesome  -->
    <script src="https://kit.fontawesome.com/06c6f7ab73.js" crossorigin="anonymous"></script>
    <!-- Icons Bootstrap  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!-- Titulo-->
    <title>XTEACH-@yield('title') </title>
</head>

 <body>
    <div  class="bg-light1 d-flex flex-column min-vh-100" id="content" >
        <nav class="navbar navbar-dark bg-dark fixed-top" >
            <div class="container-fluid">
                <a class="navbar-brand" href="{{route('welcome')}}"> XTEACH LEARN WITH US <i class="bi bi-calendar-plus"></i></a>
                    @auth
                        <form action="{{route('logout')}}" method="POST" class="text-center">
                            <button type="submit" class="btn btn-light" > <i class="fa-solid fa-right-from-bracket"> Log Out {{Auth::user()->name}}</i> </button>
                            @csrf
                        </form>
                    @endauth
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">OPCIONES</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{route('welcome')}}"> <i class="bi bi-house-door-fill"></i>   Inicio </a>
                            </li>
                            @auth()
                                @if(auth()->user()->hasRole('alumno'))
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page" href="{{route('curso.index')}}">  <i class="bi bi-eyeglasses"></i>  Cursos Disponibles</a>
                                    </li>
                                @endif
                            @endauth
                            <li class="nav-item dropdown" aria-current="page">
                                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"> <i class="bi bi-people-fill"></i>  Users   </a>
                                    <ul class="dropdown-menu dropdown-menu-dark" aria-current="page">
                                            @guest()
                                                    <li class="nav-item">
                                                        <a class="nav-link active" aria-current="page" href="{{route('register.create')}}">  Regístrate como Alumno </a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link active" aria-current="page" href="{{route('register.create.admin')}}">  Registrate como Admin</a>
                                                    </li>

                                                    <li class="nav-item">
                                                        <a class="nav-link active" aria-current="page" href="{{route('session.create')}}">  Entra aquí  </a>
                                                    </li>

                                            @endguest

                                                 @auth()
                                                    @if(auth()->user()->hasRole('admin'))
                                                        <li class="nav-item">
                                                            <a class="nav-link active" aria-current="page" href="{{route('goto-add-curso')}}">  Añadir Curso para admins </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link active" aria-current="page" href="{{route('showcursosadmin')}}">  Mostrar Cursos Creados </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link active" aria-current="page" href="{{route('showalumnosadmin')}}">  Tus Alumnos</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link active" aria-current="page" href="{{route('showmedia')}}"> Nota Media de Tus Alumnos</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link active" aria-current="page" href="{{route('showprogreso')}}"> Progreso Medio de Tus Alumnos</a>
                                                        </li>
                                                    @endif
                                                @endauth
                                                @auth()
                                                    @if(auth()->user()->hasRole('alumno'))
                                                    <li class="nav-item">
                                                        <a class="nav-link active" aria-current="page" href="{{route('miperfil')}}">  Ver Mi Perfil </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link active" aria-current="page" href="{{route('show')}}">  Mis cursos Matriculados </a>
                                                    </li>
                                                    @endif
                                                @endauth
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>
    <!-- Para solventar problemas de version con este tipo de navbar-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
 </body>

</html>

