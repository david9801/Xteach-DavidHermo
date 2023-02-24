@extends('layout.app')
@section('title', 'Ver perfil')
@section('content')

    <div style="margin-top: 80px; text-align: center; ">
        @if(!is_null(Auth::user()->profile_image))
            <img src="{{ asset('storage/'.Auth::user()->profile_image) }}" alt="Profile Image" width="250" height="250" style="border: 3px solid gray;border-radius: 90%;">
        @endif
    </div>
    <div>
        <h2>Aqui mostraré las clases del alumno y otros datos</h2>
    </div>

@endsection
