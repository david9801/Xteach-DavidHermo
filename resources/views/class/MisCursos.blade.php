@extends('layout.app')
@section('title', 'Mis cursos')
@section('content')

    <div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Curso</th>
                <th scope="col">Documentos</th>
                <th scope="col">Nota media sobre 100 </th>
                <th scope="col">Progreso </th>
                <th scope="col">Progreso Medio</th>
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
                    <td>  {{100*$row->progreso_medio/$row->curso->temas}}% </td>

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
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

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
