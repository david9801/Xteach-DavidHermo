@extends('layout.app')
@section('title', 'Añade un curso')
@section('content')
    <style>
            .card-body {
                max-width: 400px;
                margin: 0 auto;
            }

            .mb-3 {
                display: inline-block;
                width: 45%;
            }

            #name {
                width: 90%;
            }

            #temas {
                width: 80%;
            }
            .container {
                 width: 70%;
                 margin-top:auto;
             }

   </style>

    <div id="div-welcome">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="text-center">¡Añade el curso que quieras impartir!</h2>
                        </div>
                        <div class="card-body text-center">
                            <form action="{{ route('createCurso') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3" id="input">
                                    <label for="name" class="form-label">Nombre del Curso</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <div class="mb-3" id="input">
                                    <label for="temas" class="form-label">Cantidad de Temas</label>
                                    <input type="number" class="form-control" id="temas" name="temas">
                                </div>
                                <div class="mb-3">
                                    <label for="archivo" class="form-label"> Archivo (.ppt o .pptx)</label>
                                    <input type="file" class="form-control-file" id="archivo" name="archivo">
                                    <small class="form-text text-muted">Solo se permiten archivos de Power Point (.pptx)</small>
                                </div>
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
