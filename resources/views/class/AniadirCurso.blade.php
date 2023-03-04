@extends('layout.app')
@section('title', 'Añade un curso')
@section('content')


    <script>
        //para arrastrar y soltar con dropzone
        Dropzone.options.myAwesomeDropzone = {
            paramName: "archivo",
            maxFilesize: 10, // en MB
            acceptedFiles: ".ppt,.pptx",
            dictDefaultMessage: "Por favor!Arrastra y suelta tu archivo aquí",
            dictFallbackMessage: "Tu navegador no admite la carga de archivos por arrastrar y soltar", // Mensaje si el navegador no admite esta funcionalidad
            dictInvalidFileType: "No puedes subir este archivo. Solo Power Point)", // Mensaje si el archivo tiene una extensión no permitida
            dictResponseError: "Ha ocurrido un error al subir el archivo",
            dictCancelUpload: "Cancelar subida",
            dictCancelUploadConfirmation: "¿Estás seguro de que deseas cancelar la subida?",
            dictRemoveFile: "Eliminar archivo",
            dictMaxFilesExceeded: "Solo puedes subir un archivo"
        };
    </script>

    <div class="mt-5">
        <div class="container w-75 mt-4">
            <div class="row justify-content-center">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="text-center">¡Añade el curso que quieras impartir!</h2>
                        </div>
                        <div class="card-body text-center">
                            <form action="{{ route('createCurso') }}" method="post" enctype="multipart/form-data" class="dropzone" id="my-awesome-dropzone">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <label for="name" class="form-label">Nombre del Curso</label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                    <div class="col-6">
                                        <label for="temas" class="form-label">Cantidad de Temas</label>
                                        <input type="number" class="form-control" id="temas" name="temas">
                                    </div>
                                </div>
                                <div class="row p-3">
                                    <div class="col">
                                        <label for="archivo" class="form-label">  <i class="bi bi-file-easel-fill"></i> Archivo (.ppt o .pptx)</label>
                                        <input type="file" class="form-control-file" id="archivo" name="archivo">
                                        <small class="form-text text-muted">Solo se permiten archivos de Power Point (.pptx)</small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary">Enviar</button>
                                    </div>
                                </div>
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
