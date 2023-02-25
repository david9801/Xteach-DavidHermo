@extends('layout.app')
@section('title', 'Nota Media ')
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
                            <th>Nota Media</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $notas = [];
                            $inscripciones = $curso->inscripcions;
                            foreach ($inscripciones as $inscripcion) {
                                $nota = $inscripcion->nota_media;
                                $alumno = $inscripcion->user;
                                if (array_key_exists($alumno->id, $notas)) {
                                    $notas[$alumno->id]['sum'] += $nota;
                                    $notas[$alumno->id]['count']++;
                                } else {
                                    $notas[$alumno->id] = ['sum' => $nota, 'count' => 1];
                                }
                            }
                        @endphp
                        @foreach ($notas as $id => $nota)
                            @php
                                $alumno = App\Models\User::findOrFail($id);
                                $nota_media = $nota['sum'] / $nota['count'];
                            @endphp
                            <tr>
                                <td>{{ $alumno->name }}</td>
                                <td>{{ $alumno->email }}</td>
                                <td>{{ $nota_media }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </div>

@endsection
