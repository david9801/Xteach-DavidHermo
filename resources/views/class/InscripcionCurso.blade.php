@extends('layout.app')
@section('title', 'Inscribirse')
@section('content')


    <style>
        #table-reserve{
            background-color: #fff;
            color: #333;
            border-radius: 5px;
            overflow: hidden;
            margin-top: 50px;
        }
    </style>
    <div>
        <table class="table" id="table-reserve">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Cantidad de Temas</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($cursos as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->nombre }}</td>
                    <td>{{ $row->temas }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <form method="POST" action="{{ route('curso.inscribirse') }}" style="overflow: hidden; width: 15%;text-align: center;">
            @csrf
            <div class="form-group" >
                <label for="curso_id">Selecciona un curso:</label>
                <select class="form-control" id="curso_id" name="curso_id">
                    @foreach ($cursos as $curso)
                        <option value="{{ $curso->id }}">{{ $curso->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Inscribirse</button>
        </form>


    </div>
@endsection



