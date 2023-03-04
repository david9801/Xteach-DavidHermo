
@extends('layout.app')
@section('title')
@section('content')
    <div class="container">
        <h1 class="text-center">Examen Realizado</h1>
        <p class="text-center">Has obtenido un  {{$inscripcion->nota_media}} en el examen {{$exam->title}} del curso {{$inscripcion->curso->name}}</p>
    </div>
@endsection
