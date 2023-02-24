@extends('layout.app')
@section('title', 'Welcome')
@section('content')

    <div >
            <table class="table" id="table-reserve">
                <thead>
                <tr>
                    <th colspan="3" class="text-center">Listado de alumnos</th>
                </tr>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($alumnos as $row)
                    <tr>
                        <td scope="row">{{ $row->id }}</td>
                        <td> {{ $row->name }}</td>
                        <td> {{ $row->email }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>

@endsection
