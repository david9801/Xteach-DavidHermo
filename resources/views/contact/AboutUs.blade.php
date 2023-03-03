@extends('layout.app')

@section('title', 'Welcome')

@section('content')

    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4 mt-4">
                <div class="card border-success">
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
        </div>
    </div>

@endsection
