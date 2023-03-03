@extends('layout.app')
@section('title', $exam->title)
@section('content')
    <div class="container">
        <h1 class="text-center">{{$exam->title}}</h1>
        <div class="row">
            @foreach($exam->questions as $question)
                @if($question->answer1 || $question->answer2 || $question->answer3)
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h5 class="card-title">{{$question->question}}</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-check">
                                    <input class="form-check-input" disabled type="radio" name="answer{{$question->id}}" id="answer{{$question->id}}1" value="1" required>
                                    <label class="form-check-label" for="answer{{$question->id}}1">{{$question->answer1}}</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" disabled type="radio" name="answer{{$question->id}}" id="answer{{$question->id}}2" value="2" required>
                                    <label class="form-check-label" for="answer{{$question->id}}2">{{$question->answer2}}</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" disabled type="radio" name="answer{{$question->id}}" id="answer{{$question->id}}3" value="3" required>
                                    <label class="form-check-label" for="answer{{$question->id}}3">{{$question->answer3}}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
