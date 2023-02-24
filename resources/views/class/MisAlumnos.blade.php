@extends('layout.app')
@section('title', 'Cursos creados por el admin')
@section('content')

    <div id="div-welcome">
        <h2>Cursos creados por el usuario</h2>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Inscripciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($cursos as $curso)
                <tr>
                    <td>{{ $curso->id }}</td>
                    <td>{{ $curso->name }}</td>
                    <td>{{ $curso->temas }}</td>
                    <td>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach ($curso->inscripcions as $inscripcion)

                                            <td>{{ $inscripcion->user_id}}</td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
