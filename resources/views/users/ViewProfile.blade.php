@extends('layout.app')
@section('title', 'Mi Perfil Alumno')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center" style="background-color: #718096;">MIS CURSOS</div>
                    <div class="card-body text-center" style="background-color: #c8ced7;">
                        <p>Cursos del user {{ Auth::user()->name }}</p>
                        <div class="card-deck">
                            <div class="card">
                                <div class="card-body">
                                    <h3>Cursos Superados:</h3>
                                    @if (count($cursosAprobadosNombres) > 0)
                                        <ul>
                                            @foreach ($cursosAprobadosNombres as $nombre)
                                                <li>{{ $nombre }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p>No ha aprobado ningún curso aún</p>
                                    @endif
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h3>Cursos Aprobados:</h3>
                                    @if (count($cursosNombres) > 0)
                                        <ul>
                                            @foreach ($cursosNombres as $key => $nombre)
                                                @if ($cursosNotas[$key] >= 50)
                                                    <li>{{ $nombre }} (nota media: {{ $cursosNotas[$key] }})</li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    @else
                                        <p>No ha superado ningún curso aún</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
