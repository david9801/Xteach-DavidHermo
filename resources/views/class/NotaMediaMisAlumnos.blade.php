@extends('layout.app')
@section('title', 'Nota Media ')
@section('content')

    <div class="container">
        <h2>Alumnos</h2>
        <table class="table" style="margin-top: 100px">
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
                $inscripciones = App\Models\Inscripcion::all();
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

@endsection
