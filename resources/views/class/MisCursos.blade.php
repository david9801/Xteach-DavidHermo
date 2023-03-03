@extends('layout.app')
@section('title', 'Mis cursos')
@section('content')

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Curso</th>
                <th scope="col">Documentos</th>
                <th scope="col">Nota media sobre 100 </th>
                <th scope="col">Progreso </th>
                <th scope="col">Porcentaje Progreso Medio</th>
                <th scope="col">Superado</th>
                <th scope="col">Graduado</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($inscripciones as $row)
                <tr>
                    <td scope="row">{{ $row->id }}</td>
                    <td> {{ $row->curso->name }}</td>
                    <td>
                        @if($row->curso->archivo)
                            <a href="{{ asset('storage/' .$row->curso->archivo) }}" target="_blank">{{ $row->curso->archivo }}</a>
                        @else
                            No subido
                        @endif
                    </td>

                    <td> {{$row->nota_media}} </td>
                    <td>  {{$row->progreso_medio}} temas de {{$row->curso->temas}}  </td>
                    <td>  {{$row->porcentaje_medio}}% </td>

                    <td>
                        @if ($row->superado == 1)
                            SUPERADO
                        @endif
                    </td>
                    <td>
                        @if ($row->superado == 1 && $row->nota_media >= 50)
                            APROBADO
                        @endif

                    </td>
                    <td>
                        <form action="{{ route('gocurso', $row->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nota_media">Nota Media</label>
                                <input type="text" class="form-control" id="nota_media" name="nota_media" value="{{ $row->nota_media }}">
                            </div>
                            <div class="form-group">
                                <label for="progreso_medio">Progreso Medio</label>
                                <input type="text" class="form-control" id="progreso_medio" name="progreso_medio" value="{{ $row->progreso_medio }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </form>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{$row->id}}" >
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$row->id}}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel{{$row->id}}">Desmatricularse</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                ¿Estás seguro que deseas desmatricularte de este curso?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <form action="{{ route('desmatricularse', $row->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Desmatricularse</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

        <a href="{{ url('mis-asignaturas-examen') }}?_token={{ csrf_token() }}" class="btn btn-primary" >Ver Posibles Examenes</a>



    @if ($errors->any())
            <div class="alert alert-danger d-flex justify-content-center">
                <ul class="text-center">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>

@endsection
