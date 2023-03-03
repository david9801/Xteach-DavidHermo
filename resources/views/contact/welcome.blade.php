@extends('layout.app')

@section('title', 'Welcome')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4 mt-4">
                <div class="card border-primary">
                    <img src="images/elearning.jpg" class="card-img-top" alt="e-learning">
                    <div class="card-body">
                        <h5 class="card-title">XTEACH</h5>
                        <p class="card-text">Sobre e-learning</p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Puedes aprender</li>
                            <li class="list-group-item">Obtener títulos</li>
                            <li class="list-group-item">Enseñar</li>
                            <li class="list-group-item">Y mucho más</li>
                        </ul>
                        <a href="https://www.becas-santander.com/es/blog/e-learning.html#:~:text=E%2Dlearning%20proviene%20del%20ingl%C3%A9s,formaci%C3%B3n%20online%20o%20aprendizaje%20virtual." class="card-link">Pincha Aquí</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
