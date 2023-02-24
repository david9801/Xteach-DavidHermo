@extends('layout.app')
@section('title', 'Registro de Admin')
@section('content')


    <div style="margin-top: 80px;">
        <form id="div-registerformadmin" action="{{route('register.store.admin')}}" method="POST" >
            @csrf
            <div class="mb-3">
                <label for="exampleInputNick" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="exampleInputNick"  name="name">
            </div>
            <div class="mb-3" >
                <label for="exampleInputEmail1" class="form-label">Email </label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                <div id="emailHelp" class="form-text">No compartimos tu e-mail con terceros.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
            </div>
            <div class="mb-3 form-check text-center" >
                <input type="checkbox" class="form-check-input" id="exampleCheck1" >
                <label class="form-check-label"  for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>


@endsection
