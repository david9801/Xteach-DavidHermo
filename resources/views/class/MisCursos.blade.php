@extends('layout.app')
@section('title', 'Mis cursos')
@section('content')
    <style>
        #table-reserve{
            background-color: #052934;
            color: #c2cbda;
            border-radius: 5px;
            overflow: hidden;
            margin-top: 50px;
        }
    </style>
    <table class="table" id="table-reserve">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Temas</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($cursos as $row)
            <tr>
                <td scope="row">{{ $row->id }}</td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->temas }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
