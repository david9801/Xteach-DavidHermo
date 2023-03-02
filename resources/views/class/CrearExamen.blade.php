@extends('layout.app')
@section('title', 'Crear Examen')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Crear examen del curso: {{$curso->name}}</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{route('createExam',$curso->id)}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="examTitle" class="form-label">Título del examen</label>
                                <input type="text" class="form-control" id="examTitle" name="title">
                            </div>

                            <!-- Iterar sobre cada pregunta -->
                            <div class="mb-3">
                                <h4 class="mb-3">Preguntas</h4>
                                @foreach (range(1, 5) as $i)
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            <h5 class="card-title">Pregunta {{ $i }}</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label for="question{{$i}}" class="form-label">Pregunta</label>
                                                <input type="text" class="form-control" id="question{{$i}}" name="questions[{{$i-1}}][question]" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="answer{{$i}}1" class="form-label">Respuesta 1</label>
                                                <input type="text" class="form-control" id="answer{{$i}}1" name="questions[{{$i-1}}][answer1]" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="answer{{$i}}2" class="form-label">Respuesta 2</label>
                                                <input type="text" class="form-control" id="answer{{$i}}2" name="questions[{{$i-1}}][answer2]" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="answer{{$i}}3" class="form-label">Respuesta 3</label>
                                                <input type="text" class="form-control" id="answer{{$i}}3" name="questions[{{$i-1}}][answer3]" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="correctAnswer{{$i}}" class="form-label">Respuesta correcta</label>
                                                <select class="form-select" id="correctAnswer{{$i}}" name="questions[{{$i-1}}][correct_answer]" required>
                                                    <option value="">Selecciona una opción</option>
                                                    <option value="1">Respuesta 1</option>
                                                    <option value="2">Respuesta 2</option>
                                                    <option value="3">Respuesta 3</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
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
                </div>
            </div>
        </div>
    </div>
@endsection
