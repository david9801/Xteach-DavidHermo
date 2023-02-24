@extends('layout.app')
@section('title', 'Cursos creados por el admin')
@section('content')

    <div id="div-welcome">
        <h2>Cursos creados por el usuario</h2>
        <table  class="table" >
            <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($cursos as $curso)
                <tr>
                    <td>{{ $curso->id }}</td>
                    <td>{{ $curso->name }}</td>
                    <td>{{ $curso->temas }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
