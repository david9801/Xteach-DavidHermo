@extends('layout.app')
@section('title', 'Ver perfil')
@section('content')

    <div style="margin-top: 110px; text-align: center; ">
        <p>Aqui mostrare datos que le pueden resultar de interes al alumno</p>
        <h2>Cursos superados:</h2>
        @if (count($cursosNombres) > 0)
            <ul>
                @foreach ($cursosNombres as $nombre)
                    <li>{{ $nombre }}</li>
                @endforeach
            </ul>
        @else
            <p>No ha superado ningún curso.</p>
        @endif
    </div>

@endsection
