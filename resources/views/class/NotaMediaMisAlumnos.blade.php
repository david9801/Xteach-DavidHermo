@extends('layout.app')

@section('title', 'Nota Media')

@section('content')
    <div class="container">
        <h2 class="my-4 text-center display-4">Nota Media de Alumnos</h2>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion" id="accordionExample">
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
                                            <th>Nota Media</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($alumno->inscripcions as $inscripcion)
                                            <tr>
                                                <td>{{ $inscripcion->curso->name }}</td>
                                                <td>{{ $inscripcion->nota_media }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <p class="fw-bold my-2">Nota Media Total: {{ $nota_media }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
