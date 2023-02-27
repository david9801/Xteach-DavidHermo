@extends('layout.app')
@section('title', 'Welcome')
@section('content')
    <style>

        #card-welcome {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            background-color: #666d70;
            margin-top: 50px ;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
            border-radius: 20px;
            overflow: hidden;

        }
    </style>

    <div class="container text-center" id="div-welcome">
        <div class="card" id="card-welcome" >
            <img src="images/contacto.jpg" class="card-img-top mx-auto d-block" style="width: 150px; height: 150px;" >
            <div class="card-body" >
                <h5 class="card-title text-center">Contacto</h5>
                <p class="card-text">Enlace a nuestro número de teléfono para consultas</p>
                <a href="tel:+34678567876" class="btn btn-primary btn-block">Llámanos</a>
                <p class="card-text">Enlace a nuestro correo electrónico para peticiones</p>
                <a href="mailto:elearning@notmail.com" class="btn btn-primary btn-block">E-mail</a>
                <p class="card-text">Nos puedes encontrar aquí ...</p>
                <a href="https://goo.gl/maps/hMjqRMtHQjX7ZkFy7" class="btn btn-primary btn-block">Google Maps</a>
            </div>
        </div>
    </div>

@endsection
