@extends('layout.app')
@section('title', $exam->title)
@section('content')
    <div class="container">
        <h1 class="text-center"> Hacer TEST del examen  {{$exam->title}}</h1>
        <form action="{{ route('submitQuestions', $exam->id) }}" method="POST">
            @csrf
            <input type="hidden" name="exam_id" value="{{$exam->id}}">
            @foreach($exam->questions as $question)
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="card-title">{{$question->question}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answer{{$question->id}}" id="answer{{$question->id}}1" value="1" required>
                            <label class="form-check-label" for="answer{{$question->id}}1">{{$question->answer1}}</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answer{{$question->id}}" id="answer{{$question->id}}2" value="2" required>
                            <label class="form-check-label" for="answer{{$question->id}}2">{{$question->answer2}}</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answer{{$question->id}}" id="answer{{$question->id}}3" value="3" required>
                            <label class="form-check-label" for="answer{{$question->id}}3">{{$question->answer3}}</label>
                        </div>
                    </div>
                </div>
            @endforeach
            <button type="submit" class="btn btn-primary">Enviar respuestas</button>
        </form>
    </div>
@endsection
