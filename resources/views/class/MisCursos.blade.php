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
                    <td>  {{$row->superado}}  </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
