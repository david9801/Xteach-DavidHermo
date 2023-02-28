@extends('layout.app')
@section('title', 'Welcome')
@section('content')


    <div class="container text-center" id="div-welcome">
        <div class="card" style="font-size: 14px; max-width: 25%; background-color: #718096; margin: auto;">
            <img src="images/elearning.jpg" class="card-img-top" alt="30px;">
            <div class="card-body">
                <h5 class="card-title">XTEACH</h5>
                <p class="card-text">Sobre e-learning</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Puedes aprender </li>
                <li class="list-group-item">Obtener títulos</li>
                <li class="list-group-item">Enseñar</li>
                <li class="list-group-item">Y mucho más</li>

            </ul>
            <div class="card-body">
                <a href="https://www.becas-santander.com/es/blog/e-learning.html#:~:text=E%2Dlearning%20proviene%20del%20ingl%C3%A9s,formaci%C3%B3n%20online%20o%20aprendizaje%20virtual." class="card-link" style="color: #c8ced7;">Pincha Aquí  </a>
            </div>
        </div>
    </div>

@endsection
