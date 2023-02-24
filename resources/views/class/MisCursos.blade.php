@extends('layout.app')
@section('title', 'Mis cursos')
@section('content')

    <div id="div-welcome">

        <table class="table" id="table-reserve">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Curso</th>
                <th scope="col">User_id</th>
                <th scope="col">Nota media </th>
                <th scope="col">Progreso Medio</th>
                <th scope="col">Superado</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($inscripciones as $row)
                <tr>
                    <td scope="row">{{ $row->id }}</td>
                    <td> {{ $row->curso_id }}</td>
                    <td> {{ $row->user_id }}</td>
                    <td> {{$row->nota_media}} </td>
                    <td>  {{$row->progreso_medio}}  </td>
                    <td>
                        @if ($row->superado == 1)
                            superado
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
    </div>

@endsection
