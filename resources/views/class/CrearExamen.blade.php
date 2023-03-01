@extends('layout.app')
@section('title', 'Crear Examen')
@section('content')
    <div>
        <h2> Crear examen del curso:   {{$curso->name}}  </h2>
        <form action="{{route('createExam',$curso->id)}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="examTitle" class="form-label">Título del examen</label>
                <input type="text" class="form-control" id="examTitle" name="title">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
            @if ($errors->any())
                <div class="alert alert-danger d-flex justify-content-center">
                    <ul class="text-center">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>

    </div>
@endsection


