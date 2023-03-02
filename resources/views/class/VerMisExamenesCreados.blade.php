@extends('layout.app')
@section('title', 'Mis Examenes Creados')
@section('content')

    <div>
        <h2>Como admin puedes ver que examenes has creado del curso {{$curso->name}}</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Título</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($exams as $exam)
                <tr>
                    <td>{{$exam->title}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
