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
        @if (session('success'))
            <div class="alert alert-success d-flex justify-content-center">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger d-flex justify-content-center">
                <ul class="text-center">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>

@endsection
