@extends('layout.app')
@section('title', 'Añade un curso')
@section('content')

    <div id="div-welcome">
        <style>
            .bg-light-blue{
                background-color: #fff;
                color: #333;
                overflow: hidden;
                margin-top: 110px;
                text-align: center;
                border-radius: 5px;
            }
        </style>
        <p class="text-xl font-bold mb-4 text-center" style="font-size: xxx-large;">¡Por favor!¡Añade el curso que quieras impartir!</p>

        <form action="{{route('createCurso')}}" method="post" class="text-center">
            @csrf
            <input type="text" class="bg-light-blue text-center" placeholder="Nombre del Curso" name="name">
            <input type="number" class="bg-light-blue text-center" placeholder="Cantidad de Temas" name="temas" style="background-color: #7f9bb6;" >
            <button type="submit" class="btn btn-primary" > Enviar</button>
        </form>

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
