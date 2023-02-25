@extends('layout.app')

@section('title', 'Progreso Medio')

@section('content')
<div class="container">
    <h2 class="my-4">Progreso Medio de Alumnos</h2>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="accordion" id="accordionExample">
                @php
                $progresos = [];
                $inscripciones = App\Models\Inscripcion::all();
                foreach ($inscripciones as $inscripcion) {
                $progreso = $inscripcion->progreso_medio;
                $alumno = $inscripcion->user;
                if (array_key_exists($alumno->id, $progresos)) {
                $progresos[$alumno->id]['sum'] += $progreso;
                $progresos[$alumno->id]['count']++;
                } else {
                $progresos[$alumno->id] = ['sum' => $progreso, 'count' => 1];
                }
                }
                @endphp
                @foreach ($progresos as $id => $progreso)
                @php
                $alumno = App\Models\User::findOrFail($id);
                $progreso_medio = $progreso['sum'] / $progreso['count'];
                @endphp
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading{{ $alumno->id }}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $alumno->id }}" aria-expanded="false"
                                aria-controls="collapse{{ $alumno->id }}">
                            {{ $alumno->name }}
                        </button>
                    </h2>
                    <div id="collapse{{ $alumno->id }}" class="accordion-collapse collapse"
                         aria-labelledby="heading{{ $alumno->id }}" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Curso</th>
                                    <th>Progreso Medio</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($alumno->inscripcions as $inscripcion)
                                <tr>
                                    <td>{{ $inscripcion->curso->name }}</td>
                                    <td>{{ $inscripcion->progreso_medio }}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <p class="fw-bold my-2">Progreso Medio Total: {{ $progreso_medio }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
