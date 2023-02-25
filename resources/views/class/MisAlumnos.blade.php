@extends('layout.app')
@section('title', 'Cursos creados por el admin')
@section('content')

    <div class="container">
        <h2>Cursos creados por el usuario</h2>
        @foreach ($cursos as $curso)
            <div class="card mb-3">
                <div class="card-header">
                    <h4>{{ $curso->name }}</h4>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Progreso Medio</th>
                            <th>Nota Media</th>
                            <th>Graduado</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($curso->inscripcions as $inscripcion)
                            <tr>
                                <td>{{ $inscripcion->user->name }}</td>
                                <td>{{ $inscripcion->user->email }}</td>
                                <td>{{ $inscripcion->progreso_medio }}</td>
                                <td>{{ $inscripcion->nota_media }}</td>
                                <td>
                                    @if ($inscripcion->superado == 1)
                                        SUPERADO
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
        <a href="{{ route('exportar') }}" class="btn btn-primary">Exportar a Excel</a>

    </div>

@endsection
