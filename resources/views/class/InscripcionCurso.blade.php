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
    </div>
@endsection



