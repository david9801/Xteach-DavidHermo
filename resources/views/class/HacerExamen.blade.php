@extends('layout.app')
@section('title', 'Mis cursos')
@section('content')

        <div>
            <h2>{{$curso->name}}</h2>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Título</th>
                    <th scope="col">Accion</th>

                </tr>
                </thead>
                <tbody>
                @foreach ($exams as $exam)
                    <tr>
                        <td>{{$exam->title}}</td>
                        <td>
                            <a href="{{route('showQuestions', $exam->id)}}" class="btn btn-primary"> Hacer TEST </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

@endsection

