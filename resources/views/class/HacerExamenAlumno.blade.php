@extends('layout.app')
@section('title', 'Examinate')
@section('content')

    <div>
        <h2>{{$curso->name}}</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Título</th>
                <th scope="col">Examinate</th>

            </tr>
            </thead>
            <tbody>
            @foreach ($exams as $exam)
                <tr>
                    <td>{{$exam->title}}</td>
                    <td>
                        <a href="{{route('showQuestions', $exam->id)}}" class="btn btn-primary">HACER TEST </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
