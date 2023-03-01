@extends('layout.app')
@section('title', 'Cursos creados por el admin')
@section('content')

    <div id="div-welcome">
        <h2 class="text-center">Cursos creados por el usuario</h2>
        <table  class="table table-striped table-hover" >
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Temario </th>
                <th>Crear Examen </th>

            </tr>
            </thead>
            <tbody>
            @foreach ($cursos as $curso)
                <tr>
                    <td>{{ $curso->id }}</td>
                    <td>{{ $curso->name }}</td>
                    <td>{{ $curso->temas }}</td>
                    <td>
                        <a    href="{{ asset('storage/' . $curso->archivo) }}" target="_blank">{{ $curso->archivo }}    </a>
                    </td>
                    <td>
                        <a href="{{ route('crear.examen.asignatura', ['id' => $curso->id]) }}" target="_blank">Ver posible examen</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{ route('exportar') }}" class="btn btn-primary" >Exportar Mis Cursos Creados</a>
    </div>

@endsection
