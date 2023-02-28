@extends('layout.app')
@section('title', 'Inscribirse')
@section('content')


    <div>
        <table class="table bg-white">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Cantidad de Temas</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($cursos as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->temas }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="row overflow-hidden mw-100">
            <div class="col-10 col-md-8 m-auto bg-white p-4 border shadow-lg">
                <form method="POST" action="{{ route('curso.inscribirse') }}" >
                    @csrf
                    <div class="form-group" >
                        <label for="curso_id">Selecciona un curso:</label>
                        <select class="form-control" id="curso_id" name="curso_id">
                            @foreach ($cursos as $curso)
                                <option value="{{ $curso->id }}">{{ $curso->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Inscribirse</button>
                </form>
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



