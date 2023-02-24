@extends('layout.app')
@section('title', 'Welcome')
@section('content')

    <div >
        @foreach ($cursos as $curso)
            <h3>{{ $curso->nombre }}</h3>
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Nota Media</th>
                    <th>Progreso Medio</th>
                    <th>Superado</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($curso->inscripciones as $inscripcion)
                    <tr>
                        <td>{{ $inscripcion->id }}</td>
                        <td>{{ $inscripcion->user->name }}</td>
                        <td>{{ $inscripcion->nota_media }}</td>
                        <td>{{ $inscripcion->progreso_medio }}</td>
                        <td>{{ $inscripcion->superado ? 'Sí' : 'No' }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endforeach

    </div>

@endsection
