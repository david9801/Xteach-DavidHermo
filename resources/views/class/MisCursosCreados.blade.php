@extends('layout.app')
@section('title', 'Cursos creados por el admin')
@section('content')

    <div class="mt.5">
        <h2 class="text-center">Cursos creados por el usuario</h2>
        <table  class="table table-striped table-hover" >
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Temario </th>
                <th>Crear Examen </th>
                <th> Ver Examenes Creados</th>

            </tr>
            </thead>
            <tbody>
            @foreach ($cursos as $curso)
                <tr>
                    <td>{{ $curso->name }}</td>
                    <td>{{ $curso->temas }}</td>
                    <td>
                        <a    href="{{ asset('storage/' . $curso->archivo) }}" target="_blank">{{ $curso->archivo }}    </a>
                    </td>
                    <td>
                        <a href="{{ route('crear.examen.asignatura', ['id' => $curso->id]) }}" target="_blank">Crear</a>
                    </td>
                    <td>
                        <a href="{{ route('mostrar.examen.asignatura', ['id' => $curso->id]) }}" target="_blank">Mostrar</a>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{ route('exportar') }}" class="btn btn-primary col-2 d-block mx-auto"> <i class="bi bi-file-earmark-spreadsheet"></i> Exportar Mis Cursos Creados</a>
    </div>

@endsection
