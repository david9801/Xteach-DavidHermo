@extends('layout.app')
@section('title', 'Mis cursos')
@section('content')
    <div>
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th scope="col">Curso</th>
                <th scope="col">Examenes</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($inscripciones as $row)
                <tr>
                    <td> {{ $row->curso->name }}</td>
                    <td>
                        <a href="{{ route('ver.examen.asignatura', ['id' => $row->curso->id]) }}" target="_blank">Ver posible examen</a>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

